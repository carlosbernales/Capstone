<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Admin_model;
use App\Models\Category_model;
use App\Models\Product_model;
use App\Models\Booking_model;
use App\Models\Account_model;
use App\Models\Order_model;
use App\Models\Order_Item_model;
use App\Models\Customization;
use App\Models\Stocks_Category_model;
use App\Models\Stocks_model;
use App\Models\Review_model;
use App\Models\Customize_model;
use App\Models\Employee_model;
use App\Models\Payment_model;

class Admin extends BaseController
{
    protected $db;
    public function __construct() {
        helper(['url', 'form','session']);
        $this->db = \Config\Database::connect();
    }

    // public function admin_login()
    // {
    //     helper(['form']);
    //     $data = [];

    //     $session = session();

    //     if ($session->get('isLoggedIn')) {
    //         $isAdmin = $session->get('isAdmin');
    //         $isEmployee = $session->get('isEmployee');

    //         if ($isAdmin) {
    //             return redirect()->to('dashboard');
    //         } elseif ($isEmployee) {
    //             return redirect()->to('to_pay_orders');
    //         } else {
    //             return redirect()->to('home');
    //         }
    //     }

    //     if ($this->request->getMethod() == 'post') {
    //         $validation = [
    //             'username' => 'required',
    //             'password' => 'required',
    //         ];

    //         // Validation errors messages

    //         if (!$this->validate($validation)) {
    //             $data['validation'] = $this->validator;
    //         } else {
    //             $model = new Admin_model();
    //             $admin = $model->where('username', $this->request->getVar('username'))->first();

    //             if ($admin) {
    //                 if ($this->verifyMypassword($this->request->getVar('password'), $admin['password'])) {
    //                     $this->setAdminSession($admin);
    //                     return redirect()->to('dashboard');
    //                 } else {
    //                     $session = session();
    //                     $session->setFlashdata('msg', 'Password is incorrect, try again.');
    //                 }
    //             } else {
    //                 $session = session();
    //                 $session->setFlashdata('msg', 'Username is incorrect, try again.');
    //             }
    //         }
    //     }

    //     return view('admin/admin_login', $data);
    // }

    // private function setAdminSession($admin)
    // {
    //     $data = [
    //         'admin_id' => $admin['id'],
    //         'admin_username' => $admin['username'],
    //         'isLoggedIn' => true,
    //         'isAdmin' => true,
    //     ];
    //     session()->set($data);
    // }

    public function admin_register()
    {
        $data = [];
        helper(['form']);
        $session = session();
        
        if ($session->get('isLoggedIn')) {
            $isAdmin = $session->get('isAdmin');
            $isEmployee = $session->get('isEmployee');
    
            if ($isAdmin) {
                return redirect()->to('dashboard');
            } elseif ($isEmployee) {
                return redirect()->to('to_pay_orders');
            } else {
                return redirect()->to('home');
            }
        }
        if($this->request->getmethod()=='post')
        {
            $validation = [
                'firstname' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'The firstname is required',
                    ],
                ],
                'lastname' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'The lastname is required',
                    ],
                ],
                'phone' => [
                    'rules'  => 'required|regex_match[/^[0-9]{11}$/]',
                    'errors' => [
                        'required' => 'The phone number is required',
                        'regex_match' => 'The phone number must have 11 digits with no space or dashes.'
                    ],
                ],
                'address' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'The address is required',
                    ],
                ],
                'email' => [
                    'rules'  => 'required|min_length[4]|max_length[50]|valid_email|is_unique[user.email]',
                    'errors' => [
                        'required' => 'The email address is required',
                        'valid_email' => 'Please check the Email field. It does not appear to be valid',
                        'is_unique' => 'Email is already taken',
                    ],
                ],
                'password' => [
                    'rules'  => 'required|min_length[8]|max_length[100]',
                    'errors' => [
                        'required' => 'Password is required.',
                        'min_length' => 'Password must have atleast 8 characters in length.',
                        'max_length' => 'Password must not have characters more than 100 characters in length.',
                    ],
                ],
                'confirm_password' => [
                    'rules'  => 'matches[password]',
                    'errors' => [
                        'required' => 'Confirm password is required.',
                        'matches' => 'Confirm Password must matches to password.',
                    ],
                ],
            ];
            if(!$this->validate($validation))
            {
                $data['validation']=$this->validator;
            }else{
                $model = new Account_model();
                $data = array(
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'phone' => $this->request->getVar('phone'),
                    'address' => $this->request->getVar('address'),
                    'password' => $this->request->getVar('password'),
                    'status' => 'not_verified',
                    'role' => 'Admin',
                );
                if($model->save($data))
                {
                    return redirect()->to('signin')
                    ->with('status_icon', 'success')    
                    ->with('status', 'Wait till the admin approve your request');
                }
            }
        }
        return view('admin/admin_register', $data);
    }

    public function update_admin($id) {
        $useSessionData = session()->get();

        $emailAddress = $this->request->getPost('email');
        $status = $this->request->getPost('status');
        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        $phone = $this->request->getPost('phone');
        $address = $this->request->getPost('address');  // Get the email address
    
        $Account_model = new Account_model();
        $employee = $Account_model->find($id);
    
        $data = [
            'status' => $this->request->getVar('status'),
        ];
        $Account_model->update($id, $data);
    
        $status = $this->request->getVar('status');
    
        if ($status == 'verified') {
            $email = \Config\Services::email();
            $email->setTo($emailAddress);
            $email->setFrom('bituinflowershop@gmail.com');
            $email->setSubject('Bituin Flower Shop');

            
            $email->setMailType('html');
            
            $message = view('admin/emails/admin_approved', [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'user_email' => $emailAddress,
                'phone' => $phone,
                'address' => $address
            ]);
             $email->setMessage($message);  
    
            if ($email->send()) {
                return redirect()->to('admins')
                    ->with('status_icon', 'success')
                    ->with('status', 'Account has been approved successfully');
            }
        }
    
        return redirect()->to('admins')
            ->with('status_icon', 'success')
            ->with('status', 'Status updated successfully');
    }
    

    // private function setUserSession($admin_data)
    // {
    //     $data = [
    //         'id' => $admin_data['id'],
    //         'username' => $admin_data['username'],
    //         'email' => $admin_data['email'],
    //         'phone' => $admin_data['phone'],
    //         'address' => $admin_data['address'],
    //         'isLoggedIn' => true,
    //     ];
    //     session()->set($data);
    //     return true;
    // }
    
    private function verifyMyPassword($enterpassword, $databasePassword)
    {   
        return password_verify($enterpassword, $databasePassword);
    }

    public function admin_logout()
    {
        $session=session();
        session()->destroy();
        return redirect()->to('/');
    }


    public function dashboard()
    {
        $data = [];

        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
        
        
        $Booking_model = new Booking_model();
        $Category_model = new Category_model();
        $Product_model = new Product_model();
        $Order_model = new Order_model();
        $Account_model = new Account_model();
        $Stocks_model = new Stocks_model();
        $Review_model = new Review_model();
        $pending_booking = 0;

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();

        $user_info = [
            'firstname' => session()->get('firstname'),
        ];
       

        // Sum of overall completed orders and walk-ins
        $sum = $Order_model->getCompletedOrderAmountSum();

        $sums = $Stocks_model->getInvestmentSum();

        // Sum of overall completed orders and walk-ins for the current month only
        $sumthismonth = $Order_model->sumoforderthismonth();
        

    
    //LINE CHART
    $query = $this->db->query("SELECT 
        order_item.item_name AS item_name, 
        SUM(order_item.item_qty * order_item.item_amount) AS total_sold, 
        DATE_FORMAT(order_item.order_date, '%M %Y') AS month_name
    FROM 
        order_item 
    JOIN 
        orderdata ON order_item.fk_order_id = orderdata.id
    WHERE 
        (order_type = 'COD' OR order_type = 'Online' OR order_type = 'POS' or order_type = 'Pick Up' or order_type = 'Pick Up (Paid)') 
        AND (order_status = 'Completed' OR order_status = 'Received')
        AND order_item.product_id IS NOT NULL
        AND order_item.product_id != ''
    GROUP BY 
        item_name, month_name
    ORDER BY 
        MONTH(order_item.order_date), YEAR(order_item.order_date)
");


$lineChartData = $query->getResultArray();


    $labels = array(); 
    $datasets = array(); 

    $tempData = array();

    foreach ($lineChartData as $data) {
        $item_name = $data['item_name'];
        $total_amount = $data['total_sold'];
        $month_name = $data['month_name'];

        if (!in_array($month_name, $labels)) {
            $labels[] = $month_name;
        }

        $tempData[$item_name][$month_name] = $total_amount;
    }

    foreach ($tempData as $item_name => $monthlyData) {
        $dataPoints = array();

        foreach ($labels as $month_name) {
            $total_amount = isset($monthlyData[$month_name]) ? $monthlyData[$month_name] : 0;
            $dataPoints[] = $total_amount;
        }

        $datasets[$item_name] = array(
            'label' => $item_name,
            'data' => $dataPoints,
            'fill' => false
        );
    }

    $chartData = array(
        'labels' => $labels,
        'datasets' => array_values($datasets)
    );

    $linechartData = json_encode($chartData);
    //LINE CHART--------------------------------------------



    //STACKED LINE----------------------------------------------
    $query = $this->db->query("SELECT 
        order_item.item_name AS item_name, 
        SUM(order_item.item_qty) AS total_sold, 
        DATE_FORMAT(order_item.order_date, '%M %Y') AS month_name
        FROM 
            order_item 
        JOIN 
            orderdata ON order_item.fk_order_id = orderdata.id
        WHERE
            (orderdata.order_type = 'POS' OR orderdata.order_type = 'COD' OR orderdata.order_type = 'Online'
            OR orderdata.order_type = 'Pick Up' OR orderdata.order_type = 'Pick Up (Paid)') 
            AND (orderdata.order_status = 'Completed' OR orderdata.order_status = 'Received' ) 
            AND (order_item.product_id IS NOT NULL AND order_item.product_id <> 0)
        GROUP BY 
            item_name, month_name
        ORDER BY 
            MONTH(order_item.order_date), YEAR(order_item.order_date)
        ");
        $stackedlineData = $query->getResultArray();


        

    $labelss = array(); 
    $data_sets = array(); 

    $tempData = array();

    foreach ($stackedlineData as $data) {
        $product_name = $data['item_name'];
        $total_sold = $data['total_sold'];
        $month_name = $data['month_name'];

        if (!in_array($month_name, $labelss)) {
            $labelss[] = $month_name;
        }

        $tempData[$product_name][$month_name] = $total_sold;
    }

    foreach ($tempData as $product_name => $monthlyData) {
        $dataPoints = array();

        foreach ($labelss as $month_name) {
            $total_sold = isset($monthlyData[$month_name]) ? $monthlyData[$month_name] : 0;
            $dataPoints[] = $total_sold;
        }

        $data_sets[$product_name] = array(
            'label' => $product_name,
            'data' => $dataPoints,
            'fill' => false
        );
    }

    $stackedchartData = array(
        'labels' => $labelss,
        'datasets' => array_values($data_sets)
    );

    $stackedLineChart = json_encode($stackedchartData);
    //STACKED LINE -----------------------------------------


    $pieChartData = $this->db->query(
        "SELECT order_item.item_name AS item_name, 
        SUM(order_item.item_qty) AS total_sold
        FROM order_item 
        JOIN orderdata ON order_item.fk_order_id = orderdata.id 
        WHERE (order_status = 'Completed' OR order_status = 'Received')
        AND (order_item.product_id IS NOT NULL AND order_item.product_id != 0)
        GROUP BY item_name ASC"
    )->getResultArray();
    

        $polarchart = $this->db->query(
            "SELECT product_name AS product_name,
            SUM(stock_qty) as stock_qty FROM stocks GROUP BY product_name"
        )->getResultArray();

        
        $barchart = $this->db->query("SELECT DATE_FORMAT(order_date, '%M %Y') AS orderdate,
        SUM(order_amount) AS total_sold
        FROM orderdata 
        WHERE (order_type = 'COD' OR order_type = 'POS' OR order_type = 'Online' or order_type = 'Pick Up' or order_type = 'Pick Up (Paid)') AND (order_status = 'Completed' OR order_status = 'Received')
        GROUP BY MONTH(order_date), YEAR(order_date)
    ")->getResultArray();



    $verticalchart = $this->db->query("SELECT orderdate, total_sold
    FROM (SELECT DATE_FORMAT(order_date, '%M %Y') AS orderdate,
            SUM(order_amount) AS total_sold,
            ROW_NUMBER() OVER (ORDER BY SUM(order_amount) DESC) AS month_rank
        FROM orderdata
        WHERE (order_type IN ('COD', 'POS', 'Online', 'Pick Up', 'Pick Up (Paid)'))
            AND (order_status IN ('Completed', 'Received'))
        GROUP BY MONTH(order_date), YEAR(order_date)
    ) ranked_months
    WHERE month_rank <= 3
    ")->getResultArray();


         



        $data = [];
        $Account_model = new Account_model();
        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();
        $newcomment = $Review_model->where('status', 'Pending')->findAll();
        $newBooking = $Booking_model->where('status', 'Pending')->findAll();
        

            
        
        $data = [
            'category_count' => $Category_model->findAll(),
            'product_count' => $Product_model->findAll(),
            'user_count' => $Account_model->findAll(),
            'order_count' => $Order_model->findAll(),
            'stocks_count' => $Stocks_model->findAll(),
            'new_orders' => $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll(),
            'new_bookings' => $Booking_model->where('status', 'Pending')->findAll(),
            'completed_orders' => $Order_model->whereIn('order_status', ['Completed', 'Received'])->findAll(),
            'completed_booking' => $Booking_model->where('status', 'Finished')->findAll(),
            'user' => $Account_model->findAll(),
            'newOrders' => $newOrders,
            'newcomment' => $newcomment,
            'newBooking' => $newBooking,

            
        
            'user_info' => $user_info,
            'stockschart' => $polarchart,
            'saleschart' => $barchart,
            'linechartData' => $linechartData,
            'stackedLineChart' => $stackedLineChart,
            'piechart' => $pieChartData,
            'sales' => $sum,
            'salesthismonth' => $sumthismonth,
            'investmentthismonth' => $sums,
            'possales' => $verticalchart,
            'chartData' => $chartData,
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders

        ];

        return view('admin/dashboard', $data);
    }



    public function reservationlist()
    {   
        $data = [];

        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }

        $user_info = [
            'firstname' => session()->get('firstname'),
        ];
        
        $Booking_model = new Booking_model();
        $Review_model = new Review_model();
        $Order_model = new Order_model();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();
        
        $booking = $Booking_model
        ->select("DATE_FORMAT(date, '%M %e, %Y') AS booking_date_formatted, booking.*")
        ->findAll();
        
        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();
        $newcomment = $Review_model->where('status', 'Pending')->findAll();
        $newBooking = $Booking_model->where('status', 'Pending')->findAll();

        $data=[
        'user_info' => $user_info,
        'booking' => $booking,
        'newOrders' => $newOrders,
        'newcomment' => $newcomment,
        'newBooking' => $newBooking,
        'toshipOrders' => $toshipOrders,
        'onthewayOrders' => $onthewayOrders
    ];
        return view('admin/reservation/reservationlist', $data);
    }

    public function reservation_report()
    {   
        $data = [];
        $user_info = [
            'firstname' => session()->get('firstname'),
        ];
        
        
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }

        $Booking_model = new Booking_model();
        $Review_model = new Review_model();
        $Order_model = new Order_model();
        
        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();

        $booking = $Booking_model->select("DATE_FORMAT(date, '%M %e, %Y') AS booking_date_formatted, booking.*")->
        where('status', 'Finished')->findAll();

        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();
        $newcomment = $Review_model->where('status', 'Pending')->findAll();
        $newBooking = $Booking_model->where('status', 'Pending')->findAll();


        $data=[
            'user_info' => $user_info,
            'booking' => $booking,
            'newOrders' => $newOrders,
            'newcomment' => $newcomment,
            'newBooking' => $newBooking,
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('admin/reservation/reservation_report', $data);
    }

    public function categorylist()
    {
        // Check if admin is logged in
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
        $user_info = [
            'firstname' => session()->get('firstname'),
        ];
        

        $data = [];
        $Category_model = new Category_model();
        $Review_model = new Review_model();
        $Order_model = new Order_model();
        $Booking_model = new Booking_model();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();

        $category = $Category_model->findAll();
        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();
        $newcomment = $Review_model->where('status', 'Pending')->findAll();
        $newBooking = $Booking_model->where('status', 'Pending')->findAll();

        $data = [
            'user_info' => $user_info,
            'category' => $category,
            'newOrders' => $newOrders,
            'newcomment' => $newcomment,
            'newBooking' => $newBooking,
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('admin/category/categorylist', $data);
    }


    public function productlist()
    {   
        $data = [];

        $user_info = [
            'firstname' => session()->get('firstname'),
        ];
        

        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }

        $Category_model = new Category_model();
        $Product_model = new Product_model();
        $Review_model = new Review_model();
        $Order_model = new Order_model();
        $Booking_model = new Booking_model();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();

        $category = $Category_model->findAll();
        $product = $Product_model->findAll();

        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();

        $newcomment = $Review_model->where('status', 'Pending')->findAll();
        $newBooking = $Booking_model->where('status', 'Pending')->findAll();


        $data=[
            'user_info' => $user_info,
            'category' => $category,
            'product' => $product,
            'newOrders' => $newOrders,
            'newcomment' => $newcomment,
            'newBooking' => $newBooking,
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('admin/product/productlist', $data);
    }


    public function orderlist()
    {
        $data = [];

        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
        $user_info = [
            'firstname' => session()->get('firstname'),
        ];
        

        $Order_model = new Order_model();
        $Review_model = new Review_model();
        $Booking_model = new Booking_model();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();
       
        $orders = $Order_model
        ->select("DATE_FORMAT(order_date, '%M %e, %Y') AS order_date_formatted, orderdata.*")
        // ->whereIn('order_type', ['COD', 'Online','Pick Up','Pick Up (Paid)', 'N/A', 'Request', 'Settle', 'Agree'])
        ->findAll();

        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();
        $newcomment = $Review_model->where('status', 'Pending')->findAll();
        $newBooking = $Booking_model->where('status', 'Pending')->findAll();

        $data=[
            'user_info' => $user_info,
            'orders' => $orders,
            'newOrders' => $newOrders,
            'newcomment' => $newcomment,
            'newBooking' => $newBooking,
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('admin/orders/orderlist', $data);
    }

    public function stocks()
    {   
        $Stocks_Category_model = new Stocks_Category_model();
        $Stocks_model = new Stocks_model();
       
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
       
       

        $data=[
            'user_info' => $user_info,
            'product_stocks' => $Stocks_model->findAll(),
            'stocks_category' => $Stocks_Category_model->findAll(),
            'newOrders' => $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll(),
            'newcomment' => $Review_model->where('status', 'Pending')->findAll(),
            'newBooking' => $Booking_model->where('status', 'Pending')->findAll(),
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('admin/stocks/stockslist', $data);
    }
    


    public function stocks_category()
    {   
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
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
        
        $data=[
            'user_info' => $user_info,
            'stocks_category' => $Stocks_Category_model->findAll(),
            'newOrders' => $Order_model->whereIn('order_status',  ['Pending', 'Settle', 'Request', 'Agree'])->findAll(),
            'newcomment' => $Review_model->where('status', 'Pending')->findAll(),
            'newBooking' => $Booking_model->where('status', 'Pending')->findAll(),
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('admin/stocks_category/stocks_category_list', $data);
    }

    public function sales()
    {

        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
        $useSessionData = session()->get();

        $data = [];
        $Order_model = new Order_model();
        $Review_model = new Review_model();
        $Booking_model = new Booking_model();
        $Order_Item_model = new Order_Item_model();
        $Account_model = new Account_model();
        
        $superadmin = $Account_model
        ->where('role', 'Superadmin')->findAll();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();

        $user_info = [
            'firstname' => session()->get('firstname'),
        ];
        
        $completed_orders = $Order_model->where('order_status', 'Completed')
        ->orWhere('order_status', 'Received')
        ->select("DATE_FORMAT(order_date, '%M %e, %Y') AS order_date_formatted, orderdata.*")
        ->findAll();

        $data=[
            'user_info' => $user_info,
            'completed_orders' => $completed_orders,
            'newOrders' => $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll(),
            'newcomment' => $Review_model->where('status', 'Pending')->findAll(),
            'newBooking' => $Booking_model->where('status', 'Pending')->findAll(),
            'toshipOrders' => $toshipOrders,
            'superadmin' => $superadmin,
            'onthewayOrders' => $onthewayOrders,
            'Order_Item_model' => $Order_Item_model,
        ];


        return view('admin/sales/saleslist', $data);
    }

    
    public function reviews()
    {
        $data = [];
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }

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
        

        $data=[
            'user_info' => $user_info,
            'reviews' => $Review_model->where('status','Pending')->findAll(),
            'newOrders' => $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll(),
            'newcomment' => $Review_model->where('status', 'Pending')->findAll(),
            'newBooking' => $Booking_model->where('status', 'Pending')->findAll(),
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('admin/reviews/reviewslist', $data);
    }
    

    public function employeelist()
    {   
        $data = [];
        if (!session()->get('isLoggedIn') || !session()->get('isSuperAdmin')) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin
        }
        $Employee_model = new Employee_model();
        $Account_model = new Account_model();
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
        

        $data=[
            'user_info' => $user_info,
            'employee' => $Account_model->where('role', 'Employee')->findAll(),
            'newOrders' => $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll(),
            'newcomment' => $Review_model->where('status', 'Pending')->findAll(),
            'newBooking' => $Booking_model->where('status', 'Pending')->findAll(),
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('admin/employee/employee_list', $data);
    }

    public function customizationlist()
    {   
        $data = [];
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
        $Customization = new Customization();
        
        $data['custom'] = $Customization->findAll();
        return view('admin/customization/customization', $data);
    }

    public function admin_profile()
    {
        $data = [];
        
        $useSessionData = session()->get();

        // Check if the user is logged in
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }


        $Category_model = new Category_model();
        $Product_model = new Product_model();
        $Review_model = new Review_model();
        $Order_model = new Order_model();
        $Booking_model = new Booking_model();
        $Account_model = new Account_model();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();

        $category = $Category_model->findAll();
        $product = $Product_model->findAll();

        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();
        $newcomment = $Review_model->where('status', 'Pending')->findAll();
        $newBooking = $Booking_model->where('status', 'Pending')->findAll();
        
        $userId = session()->get('isSuperAdmin') ? $useSessionData['superadmin_id'] : $useSessionData['admin_id'];
        $userData = $Account_model->find($userId);
        
        $data = [
            'category' => $category,
            'product' => $product,
            'newOrders' => $newOrders,
            'newcomment' => $newcomment,
            'newBooking' => $newBooking,
            'userData' => $userData, // Pass user information to the view
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];

        return view('admin/profile', $data);
    }

    public function admins()
    {
        $data = [];

        // Check if the user is logged in
        if (!session()->get('isLoggedIn') || !session()->get('isSuperAdmin')) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }

        // Assuming you have stored user information in the session, retrieve it
        $user_info = [
            'firstname' => session()->get('firstname'),
            'lastname' => session()->get('lastname'),
            'email' => session()->get('email'),
            'phone' => session()->get('phone'),
            'address' => session()->get('address'),
            'password' => session()->get('password'),
        ];

        $Category_model = new Category_model();
        $Product_model = new Product_model();
        $Review_model = new Review_model();
        $Order_model = new Order_model();
        $Booking_model = new Booking_model();
        $Account_model = new Account_model();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();


        $category = $Category_model->findAll();
        $product = $Product_model->findAll();
        $account = $Account_model->where('role', 'Admin')->findAll();

        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();
        $newcomment = $Review_model->where('status', 'Pending')->findAll();
        $newBooking = $Booking_model->where('status', 'Pending')->findAll();

        $data = [
            'category' => $category,
            'account' => $account,
            'product' => $product,
            'newOrders' => $newOrders,
            'newcomment' => $newcomment,
            'newBooking' => $newBooking,
            'user_info' => $user_info, // Pass user information to the view
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];

        return view('admin/admins', $data);
    }
    public function paymentlist()
    {   
        $data = [];

        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }

        $user_info = [
            'firstname' => session()->get('firstname'),
        ];
        
        $Booking_model = new Booking_model();
        $Review_model = new Review_model();
        $Order_model = new Order_model();
        $Payment_model = new Payment_model();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();
        
        $payment = $Payment_model
        ->select("DATE_FORMAT(payment_date, '%M %e, %Y') AS payment_date_formatted, payment_data.*")->where('status', 'Pending')
        ->findAll();
        
        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();
        $newcomment = $Review_model->where('status', 'Pending')->findAll();
        $newBooking = $Booking_model->where('status', 'Pending')->findAll();

        $data=[
        'user_info' => $user_info,
        'payment' => $payment,
        'newOrders' => $newOrders,
        'newcomment' => $newcomment,
        'newBooking' => $newBooking,
        'toshipOrders' => $toshipOrders,
        'onthewayOrders' => $onthewayOrders
    ];
        return view('admin/reservation/payments', $data);
    }


}
