<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product_model;
use App\Models\Account_model;
use App\Models\Order_model;
use App\Models\Order_Item_model;
use App\Models\Category_model;
use App\Models\Review_model;
use App\Models\Booking_model;
use App\Models\Stocks_model;
use App\Models\Stocks_Category_model;

class POS extends Controller
{
    public function postview()
    {
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
        $Category_model = new Category_model();
        $productModel = new Product_model();
        $Stocks_model = new Stocks_model();
        $Stocks_Category_model = new Stocks_Category_model();

        $Order_model = new Order_model();
        $Review_model = new Review_model();
        $Booking_model = new Booking_model();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();

        $user_info = [
            'firstname' => session()->get('firstname'),
        ];
        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();
        

        $data=[
            'user_info' => $user_info,
            'stocks_category' => $Stocks_Category_model->findAll(),
            'stocks' => $Stocks_model->findAll(),
            'product' => $productModel->findAll(),
            'category' => $Category_model->findAll(),
            'newOrders' => $newOrders,
            'newcomment' => $Review_model->where('status', 'Pending')->findAll(),
            'newBooking' => $Booking_model->where('status', 'Pending')->findAll(),
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];

        return view('pos/pos', $data);
    }

    
    public function submitForm()
    {
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
        session()->setFlashdata('form_data', $_POST);

        $referenceId = mt_rand(10000000, 99999999);

        // Store the reference ID in session
        session()->setFlashdata('reference_id', $referenceId);

        return redirect()->to(site_url('receipt'));
    }
    public function insertData()
    {
        // Check if the user is logged in as admin or superadmin
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to the landing page if not logged in as admin or superadmin
        }

        $Order_model = new Order_model();
        $Order_item_model = new Order_item_model();

        $referenceId = $this->request->getPost('reference_id'); 
        $order_type = $this->request->getPost('order_type');
        $order_status = $this->request->getPost('order_status');
        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        $contact = $this->request->getPost('contact');

        $totalOrderAmount = 0; 

        $formDataArray = $this->request->getPost('formDataArray'); 

        if ($formDataArray && is_array($formDataArray)) {
            foreach ($formDataArray as $formData) {
                $totalOrderAmount += $formData['total_input'];
            }

            $orderData = [
                'order_id' => $referenceId,
                'order_amount' => $totalOrderAmount,
                'order_type' => $order_type,
                'order_status' => $order_status,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'contact' => $contact,
                'flower_sizeOrtype' => 'POS',

            ];

            $orderId = $Order_model->insert($orderData); 

            foreach ($formDataArray as $formData) {
                $orderItemData = [
                    'item_name' => $formData['name'],
                    'product_id' => $formData['product_id'],
                    'fk_order_id' => $orderId,  
                    'item_amount' => $formData['price'],
                    'item_qty' => $formData['new_input']
                ];

                $Order_item_model->insert($orderItemData);
            }
        }
        return redirect()->to('pos_view') 
            ->with('status_icon', 'success')
            ->with('status', 'Transaction Done');
    }


    public function printView()
    {
        $useSessionData = session()->get();
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
        $userId = session()->get('isSuperAdmin') ? $useSessionData['superadmin_id'] : $useSessionData['admin_id'];
        $Account_model = new Account_model();
        $userData = $Account_model->find($userId);
        $referenceId = session('reference_id');
        $formData = session('form_data');

        $name = $formData['name'] ?? [];
        $price = $formData['price'] ?? [];
        $product_id = $formData['product_id'] ?? [];
        $newInput = $formData['new_input'] ?? [];
        $totalInput = $formData['total_input'] ?? [];
        $receiptTotal = array_sum($totalInput);
        $amountPaid = $formData['amount-paid'] ?? '';
        $change = $formData['change'] ?? '';
        $firstname = $formData['firstname'] ?? '';
        $lastname = $formData['lastname'] ?? '';
        $contact = $formData['contact'] ?? '';

        $formDataArray = [];
        $count = count($name);
        for ($i = 0; $i < $count; $i++) {
            $formDataArray[] = [
                'name' => $name[$i] ?? '',
                'product_id' => $product_id[$i] ?? '',
                'price' => $price[$i] ?? '',
                'new_input' => $newInput[$i] ?? '',
                'total_input' => $totalInput[$i] ?? ''
            ];
        }

        return view('pos/print_view', [
            'reference_id' => $referenceId,
            'formDataArray' => $formDataArray,
            'receipt_total' => $receiptTotal,
            'amount_paid' => $amountPaid,
            'change' => $change,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'contact' => $contact,
            'userData' => $userData
        ]);
    }

    public function postview_custom()
    {
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
        $Stocks_model = new Stocks_model();
        $Stocks_Category_model = new Stocks_Category_model();

        $Order_model = new Order_model();
        $Review_model = new Review_model();
        $Booking_model = new Booking_model();

        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();

        $user_info = [
            'firstname' => session()->get('firstname'),
        ];
        

        $data=[
            'user_info' => $user_info,
            'stocks_category' => $Stocks_Category_model->findAll(),
            'stocks' => $Stocks_model->findAll(),
            'newOrders' => $newOrders,
            'newcomment' => $Review_model->where('status', 'Pending')->findAll(),
            'newBooking' => $Booking_model->where('status', 'Pending')->findAll(),
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];

        return view('pos/pos_custom', $data);
    }

    public function submit_custom_pos()
    {
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
        session()->setFlashdata('form_data', $_POST);

        $referenceId = mt_rand(100000000, 999999999);

        // Store the reference ID in session
        session()->setFlashdata('reference_id', $referenceId);

        return redirect()->to(site_url('receipt_'));
    }


    public function custom_printView()
    {
        $useSessionData = session()->get();
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
        $userId = session()->get('isSuperAdmin') ? $useSessionData['superadmin_id'] : $useSessionData['admin_id'];
        $Account_model = new Account_model();
        $userData = $Account_model->find($userId);
        $referenceId = session('reference_id');
        $formData = session('form_data');
        $receiptTotal = $formData['receipt-total'] ?? 0.00;

        $name = $formData['name'] ?? [];
        $color = $formData['color'] ?? [];
        $price = $formData['price'] ?? [];
        $newInput = $formData['new_input'] ?? [];
        $totalInput = $formData['total_input'] ?? [];
       
        $amountPaid = $formData['amount-paid'] ?? '';
        $change = $formData['change'] ?? '';
        $labor = $formData['labor'] ?? '';
        $firstname = $formData['firstname'] ?? '';
        $lastname = $formData['lastname'] ?? '';
        $contact = $formData['contact'] ?? '';


        $formDataArray = [];
        $count = count($name);
        for ($i = 0; $i < $count; $i++) {
            $formDataArray[] = [
                'name' => $name[$i] ?? '',
                'color' => $color[$i] ?? '',
                'price' => $price[$i] ?? '',
                'new_input' => $newInput[$i] ?? '',
                'total_input' => $totalInput[$i] ?? ''
            ];
        }

        return view('pos/custom_printview', [
            'reference_id' => $referenceId,
            'formDataArray' => $formDataArray,
            'receipt_total' => $receiptTotal,
            'amount_paid' => $amountPaid,
            'change' => $change,
            'labor' => $labor,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'contact' => $contact,
            'userData' => $userData
        ]);
    }

    public function insertData_custom()
    {
        // Check if the user is logged in as admin or superadmin
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to the landing page if not logged in as admin or superadmin
        }

        $Order_model = new Order_model();
        $Order_item_model = new Order_item_model();

        $referenceId = $this->request->getPost('reference_id'); 
        $order_type = $this->request->getPost('order_type');
        $order_status = $this->request->getPost('order_status'); 
        $receipt_total = $this->request->getPost('receipt_total'); 
        $labor = $this->request->getPost('labor'); 
        $firstname = $this->request->getPost('firstname'); 
        $lastname = $this->request->getPost('lastname'); 
        $contact = $this->request->getPost('contact'); 


        $totalOrderAmount = 0; 

        $formDataArray = $this->request->getPost('formDataArray'); 

        if ($formDataArray && is_array($formDataArray)) {

            foreach ($formDataArray as $formData) {
                $totalOrderAmount += $formData['total_input'];
            }

            $orderData = [
                'order_id' => $referenceId,
                'order_amount' => $totalOrderAmount,
                'order_type' => $order_type,
                'order_status' => $order_status,
                'labor' => $labor,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'contact' => $contact,
                'flower_sizeOrtype' => 'POS',
            ];

            $orderId = $Order_model->insert($orderData); 

            foreach ($formDataArray as $formData) {
                $orderItemData = [
                    'item_name' => $formData['name'],
                    'fk_order_id' => $orderId,  
                    'item_amount' => $formData['price'],
                    'item_qty' => $formData['new_input']
                ];

                $Order_item_model->insert($orderItemData);
            }
        }
        return redirect()->to('pos_custom') 
            ->with('status_icon', 'success')
            ->with('status', 'Transaction Done');
    }

}
