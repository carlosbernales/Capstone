<?php

namespace App\Controllers;
use App\Models\Account_model;
use App\Models\Category_model;
use App\Models\Product_model;
use App\Models\Cart_model;
use App\Models\Shipping_model;
use App\Models\Order_Item_model;
use App\Models\Ship_Checkout_model;
use App\Models\Order_model;
use App\Models\Payment_model;
use App\Models\Stocks_Category_model;
use App\Models\Stocks_model;
use App\Models\Customize_model;
use App\Models\City_model;
use App\Models\Barangay_model;
use App\Models\Review_model;

class Customize extends BaseController
{
   
    public function customize()
    {
        $data = [];
        $Customize_model = new Customize_model();
        $useSessionData = session()->get();
        $Product_model = new Product_model();
        $Order_model = new Order_model();
        $Category_model = new Category_model();
        $Stocks_Category_model = new Stocks_Category_model();
        $Stocks_model = new Stocks_model();

        $data['cart_items'] = $Product_model
            ->select('product.id,
            product.product_name,
            product.product_des,
            product.product_qty as productquantity,
            product.product_image,
            product.product_price,
            cart.id as Cartid,
            cart.fk_product_id,
            cart.fk_user_id,
            cart.cart_qty as CartQty,
            cart.cart_cost')
            ->where('cart.fk_user_id', $useSessionData['id'])
            ->join('cart', 'cart.fk_product_id = product.id')
            ->findAll();

        if ($this->request->getMethod() == 'post') {
            $validation = [
                'item_image' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[item_image]|is_image[item_image]|mime_in[item_image,image/jpg,image/jpeg,image/png]'
                ]
            ];
            if (!$this->validate($validation)) {
                $data['validation'] = $this->validator;
            } else {
                $file = $this->request->getFile('item_image');

                if ($file->isValid() && !$file->hasMoved()) {
                    $upload_image = $file->getRandomName();
                    $file->move('public/products/', $upload_image);
                }

                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $digits = '0123456789';

                $randomString = substr(str_shuffle($characters), 0, 4) . substr(str_shuffle($digits), 0, 8);
                $orderId = '#' . str_shuffle($randomString);


                $orderData = [
                    'order_id' => $orderId,
                    'fk_user_id' => $useSessionData['id'],
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'user_email' => $this->request->getVar('email'),
                    'contact' => $this->request->getVar('contact'),
                    'details' => $this->request->getVar('details'),
                    'item_qty' => $this->request->getVar('item_qty'),
                    'order_status' => $this->request->getVar('order_status'),
                    'order_type' => $this->request->getVar('order_type'),
                    'flower_sizeOrtype' => $this->request->getVar('flower_sizeOrtype')
                ];
                $Order_model->insert($orderData);

                $Order_Item_model = new Order_Item_model();
                $order_id = $Order_model->getInsertID();
                $orderItemData = [
                    'item_image' => $upload_image,
                    'details' => $this->request->getVar('details'),
                    'item_qty' => $this->request->getVar('item_qty'),
                    'item_name' => $this->request->getVar('item_name'),
                    'fk_order_id' => $order_id
                ];
                $Order_Item_model->insert($orderItemData);

                // Redirect to the customize page with a success message
                return redirect()->to('orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Customization has been placed successfully');
            }
            
        }
        
        $Account_model = new Account_model();
        $data ['superadminAccounts'] = $Account_model->where('role', 'Superadmin')->findAll();
        
        // Fetch all for Small Bouquet
        $roseColors = $Stocks_model->distinct()->select('color')->where('product_name', 'Rose')->findAll();
        $rhadusColors = $Stocks_model->distinct()->select('color')->where('product_name', 'Rhadus')->findAll();
        $ribbonColors = $Stocks_model->distinct()->select('color')->where('product_name', 'Satin')->findAll();
        $wrapperColors = $Stocks_model->distinct()->select('color')->where('product_name', 'Wrapper')->findAll();
    
        $data['roseColors'] = $roseColors;
        $data['rhadusColors'] = $rhadusColors;
        $data['ribbonColors'] = $ribbonColors;
        $data['wrapperColors'] = $wrapperColors;
        
        // Fetch all for Regular Bouquet
        $regroseColors = $Stocks_model->distinct()->select('color')->where('product_name', 'Rose')->findAll();
        $regrhadusColors = $Stocks_model->distinct()->select('color')->where('product_name', 'Rhadus')->findAll();
        $regribbonColors = $Stocks_model->distinct()->select('color')->where('product_name', 'Satin')->findAll();
        $regwrapperColors = $Stocks_model->distinct()->select('color')->where('product_name', 'Wrapper')->findAll();
    
        $data['regroseColors'] = $regroseColors;
        $data['regrhadusColors'] = $regrhadusColors;
        $data['regribbonColors'] = $regribbonColors;
        $data['regwrapperColors'] = $regwrapperColors;
        
        
        
         // Drag and Drop Stocks Category List
        $data['stocks_category'] = $Stocks_Category_model->whereIn('category_name', ['Fresh Flowers', 'Ribbon', 'Wrapper'])->findAll();
        $data['category'] = $Category_model->findAll();


        // Fetch products for each category
        $data['products_by_category'] = [];
        foreach ($data['stocks_category'] as $category) {
            $categoryId = $category['id'];
            $products = $Stocks_model->getProductsByCategory($categoryId);
            $data['products_by_category'][$categoryId] = $products;
        }
        
        


        return view('home/customize', $data);
    }
    
    public function small_customize(){
        
        $useSessionData = session()->get();
        $Order_model = new Order_model();
        $Order_Item_model = new Order_Item_model();
        
        if ($this->request->getMethod() == 'post') {
            
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $digits = '0123456789';
            $randomString = substr(str_shuffle($characters), 0, 4) . substr(str_shuffle($digits), 0, 8);
            $orderId = '#' . str_shuffle($randomString);
    
            // Get selected colors from the modal form
            $roseColor = $this->request->getVar('rose_color');
            $rhadusColor = $this->request->getVar('rhadus_color');
            $ribbonColor = $this->request->getVar('ribbon_color');
            $wrapperColor = $this->request->getVar('wrapper_color');
    
            $description = "Rose $roseColor, Rhadus $rhadusColor, Ribbon $ribbonColor, Wrapper $wrapperColor";
            
            $orderData = [
                'order_id' => $orderId,
                'fk_user_id' => $useSessionData['id'],
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'user_email' => $this->request->getVar('email'),
                'contact' => $this->request->getVar('contact'),
                'details' => $description,
                'item_qty' => $this->request->getVar('item_qty'),
                'order_status' => $this->request->getVar('order_status'),
                'order_type' => $this->request->getVar('order_type'),
                'flower_sizeOrtype' => $this->request->getVar('flower_sizeOrtype'),
            ];
            $Order_model->insert($orderData);
            
            
            $upload_image = 'smallpdf.jpg';
            
            $order_id = $Order_model->getInsertID();
            
            // Get selected colors from the modal form
            $roseColor = $this->request->getVar('rose_color');
            $rhadusColor = $this->request->getVar('rhadus_color');
            $ribbonColor = $this->request->getVar('ribbon_color');
            $wrapperColor = $this->request->getVar('wrapper_color');
    
            $description = "Rose $roseColor, Rhadus $rhadusColor, Ribbon $ribbonColor, Wrapper $wrapperColor";
            
            $orderItemData = [
                'fk_order_id' => $order_id,
                'item_name' => $this->request->getVar('item_name'),
                'item_amount' => $this->request->getVar('item_amount'),
                'item_qty' => $this->request->getVar('item_qty'),
                'details' => $description,
                'item_image' => $upload_image
            ];
    
            $Order_Item_model->insert($orderItemData);
        // Redirect to the customize page with a success message
            return redirect()->to('orders')
                ->with('status_icon', 'success')
                ->with('status', 'Small Bouquet Customization has been placed successfully');
        } 
    }
    
    public function regular_customize(){
        
        $useSessionData = session()->get();
        $Order_model = new Order_model();
        $Order_Item_model = new Order_Item_model();
        
        if ($this->request->getMethod() == 'post') {
            
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $digits = '0123456789';
            $randomString = substr(str_shuffle($characters), 0, 4) . substr(str_shuffle($digits), 0, 8);
            $orderId = '#' . str_shuffle($randomString);
    
            // Get selected colors from the modal form
            $roseColor = $this->request->getVar('rose_color');
            $rhadusColor = $this->request->getVar('rhadus_color');
            $ribbonColor = $this->request->getVar('ribbon_color');
            $wrapperColor = $this->request->getVar('wrapper_color');
    
            $description = "Rose $roseColor, Rhadus $rhadusColor, Ribbon $ribbonColor, Wrapper $wrapperColor";
            
            $orderData = [
                'order_id' => $orderId,
                'fk_user_id' => $useSessionData['id'],
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'user_email' => $this->request->getVar('email'),
                'contact' => $this->request->getVar('contact'),
                'details' => $description,
                'item_qty' => $this->request->getVar('item_qty'),
                'order_status' => $this->request->getVar('order_status'),
                'order_type' => $this->request->getVar('order_type'),
                'flower_sizeOrtype' => 'Regular Bouquet',
            ];
            $Order_model->insert($orderData);
           
            
            $upload_image = 'regularpdf.jpg';
        
            $order_id = $Order_model->getInsertID();
        
            // Get selected colors from the modal form
            $roseColor = $this->request->getVar('rose_color');
            $rhadusColor = $this->request->getVar('rhadus_color');
            $ribbonColor = $this->request->getVar('ribbon_color');
            $wrapperColor = $this->request->getVar('wrapper_color');
    
            $description = "Rose $roseColor, Rhadus $rhadusColor, Ribbon $ribbonColor, Wrapper $wrapperColor";
        
       
        
            $orderItemData = [
                'fk_order_id' => $order_id,
                'item_name' => $this->request->getVar('item_name'),
                'item_amount' => $this->request->getVar('item_amount'),
                'item_qty' => $this->request->getVar('item_qty'),
                'details' => $description,
                'item_image' => $upload_image
            ];

            $Order_Item_model->insert($orderItemData);
            
            // Redirect to the customize page with a success message
            return redirect()->to('orders')
                ->with('status_icon', 'success')
                ->with('status', 'Regular Bouquet Customization has been placed successfully');
            
        } 
    }
    
    
   public function insertOrderItems()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $digits = '0123456789';
        $randomString = substr(str_shuffle($characters), 0, 4) . substr(str_shuffle($digits), 0, 8);
        $orderID = '#' . str_shuffle($randomString);
        
        $useSessionData = session()->get();
    
        $postData = $this->request->getPost();
        $productsData = json_decode($postData['products'], true);
    
        $orderModel = new Order_model();
        $orderData = [
            'order_id' => $orderID,
            'fk_user_id' => $useSessionData['id'],
            'order_status' => $productsData['additional']['orderStatus'],
            'order_type' => $productsData['additional']['orderType'],
            'firstname' => $productsData['additional']['firstname'],
            'lastname' => $productsData['additional']['lastname'],
            'user_email' => $productsData['additional']['email'],
            'contact' => $productsData['additional']['contact'],
            'flower_sizeOrtype' => $productsData['additional']['flowerSizeOrType'],
        ];
        $orderModel->insert($orderData);
    
        // Get the order ID
        $orderID = $orderModel->getInsertID();
    
        $orderItemModel = new Order_item_model();
    
         foreach ($productsData['products'] as $product) {
       // Move the image to the desired directory
        $imageSrc = $product['imageSrc']; // Assuming this is the image source URL

        // Extract the file name from the image URL
        $imageName = basename($imageSrc);

        // Download the image content
        $imageContent = file_get_contents($imageSrc);

        // Save the image to the desired directory
        $imagePath = 'public/products/' . $imageName;
        file_put_contents($imagePath, $imageContent);

        // Insert order item with the image path
        $orderItemModel->insert([
            'fk_order_id' => $orderID,
            'item_qty' => $product['quantity'],
            'item_name' => $product['productName'],
            'item_color' => $product['color'],
            'item_image' => $imageName,
        ]);
    }

    
        return redirect()->to('orders');
    }






  


    public function edit_customize($id)
    {
        $Customize_model = new Customize_model();
        $data['custom'] = $Customize_model->find($id);
        return view('admin/customization/editcustom', $data);
    }

    public function update_customize($id)
    {
       
        $Customize_model = new Customize_model();
        $custom_item = $Customize_model->find($id);
        $old_img_name = $custom_item['image'];
        $file = $this->request->getFile('image');
        if($file->isValid() && !$file->hasMoved())
        {
            if(file_exists("public/customize_image/". $old_img_name)){
                unlink("public/customize_image/". $old_img_name);
            }
            $imageName = $file->getRandomName();
            $file->move('public/customize_image/', $imageName);
        }
        else{
            $imageName = $old_img_name;
        }
        $data = [
            'details' => $this->request->getVar('details'),
            'budeget' => $this->request->getVar('budeget'),
            'status' => $this->request->getVar('status'),
            'image' => $imageName,
        ];
        $Customization->update($id, $data);
        return redirect()->to('customizationlist')
                            ->with('status_icon', 'success')
                            ->with('status', 'Customization updated successfully');
        
    }


    public function delete_customize($id)
    {
        $Customize_model = new Customize_model();
        $data['custom'] = $Customize_model->delete($id);
        return redirect()->to('orders')
                            ->with('status_icon', 'success')
                            ->with('status', 'Customization deleted successfully');
    }
    public function add_price($id)
    {
        $Order_model = new Order_model();
        $Order_item_model = new Order_item_model();
    
        $item_amount = $this->request->getPost('item_amount');
        $order_status = $this->request->getPost('order_status');
        $item_qty = $this->request->getPost('item_qty');
        $user_email = $this->request->getPost('user_email');
        $order_id = $this->request->getPost('order_id');
        $item_name = $this->request->getPost('item_name');
        $details = $this->request->getPost('details');
        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        $contact = $this->request->getPost('contact');
        $flower_sizeOrtype = $this->request->getPost('flower_sizeOrtype'); // Add this line to get the value
    
        // Check if $flower_sizeOrtype is equal to "DragNdrop"
        if ($flower_sizeOrtype == 'DragNdrop') {
            // Skip computation and insert order_amount from POST
            $order_amount = $this->request->getPost('order_amount');
        } else {
            // Compute order_amount based on item_amount and item_qty
            $order_amount = $item_amount * $item_qty;
        }
    
        $order = $Order_model->find($id);
    
        $Order_Item_model = new Order_Item_model();
        $orderItems = $Order_Item_model->where('fk_order_id', $order['id'])->findAll();
    
        $data = [
            'item_amount' => $item_amount,
            'order_status' => $order_status,
            'item_qty' => $item_qty,
            'order_amount' => $order_amount,
        ];
    
        $Order_model->update($id, $data);
    
        $related_items = $Order_item_model->where('fk_order_id', $id)->findAll();
    
        foreach ($related_items as $item) {
            $new_item_amount = $item_amount;
            $item_data = [
                'item_amount' => $new_item_amount,
            ];
            $Order_item_model->update($item['id'], $item_data);
        }
        $item_names = [];
        $item_qtys = [];
        $item_amounts = [];
        $item_colors = [];
        // $item_images = [];

        foreach ($orderItems as $orders) {
            $item_names[] = $orders['item_name'];
            $item_qtys[] = $orders['item_qty'];
            $item_amounts[] = $orders['item_amount'];
            $item_colors[] = $orders['item_color'];
            // $item_images[] = site_url('public/products/' . $orders['item_image']); 
        }
    
        if ($order_status == 'Settle' and $flower_sizeOrtype == 'DragNdrop') {
            $email = \Config\Services::email();
            $email->setTo($user_email);
            $email->setFrom('bituinsflowershop@gmail.com');
            $email->setSubject('Bituin Flower Shop');
            $email->setMailType('html');
    
            $message = view('admin/emails/settle_custom_dragdrop', [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'order_id' => $order_id,
                'item_name' => $item_name,
                'order_amount' => $order_amount,
                'item_names' => $item_names,
                'item_colors' => $item_colors,
                'item_qtys' => $item_qtys,
                'details' => $details,
                'user_email' => $user_email,
                'item_qty' => $item_qty,
                'item_amount' => $item_amount,
                'contact' => $contact,
            ]);
    
            $email->setMessage($message);
            if ($email->send()) {
                return redirect()->to('pendingorders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
            }
        }
         else if($flower_sizeOrtype != 'DragNdrop' and $order_status == 'Settle' ){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

                $email->setMailType('html');
                
                $message = view('admin/emails/settle_custom', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'order_amount' => $order_amount,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amount,
                ]);
                $email->setMessage($message);

                if($email->send()){
                    return redirect()->to('pendingorders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
    
        return redirect()->to('pendingorders')
            ->with('status_icon', 'success')
            ->with('status', 'Updated successfully');
    }



    public function details($id)
    {
        $useSessionData = session()->get();
        $data = [];
        $Category_model = new Category_model();
        $product = new Product_model();
        $Shipping_model = new Shipping_model();
        $cityModel = new City_model();
        $Ship_Checkout_model = new Ship_Checkout_model();
        $Order_model = new Order_model();
        $Order_Item_model = new Order_Item_model();
        
        
        $product->select(
            'product.id,
            product.product_name,
            product.product_des,
            product.product_qty as productquantity,
            product.product_image,
            product.product_price,
            cart.id as Cartid,
            cart.fk_product_id,
            cart.fk_user_id,
            cart.cart_qty as CartQty,
            cart.cart_cost'
            );

            $orderDetails = $Order_model->find($id);

            if (!$orderDetails) {
                return view('order_not_found'); 
            }
    
            $data['orderDetails'] = $orderDetails;
            $orderItems = $Order_Item_model->where('fk_order_id', $id)->findAll();

            $data['orderItems'] = $orderItems;

        $product->where('cart.fk_user_id', $useSessionData['id']);
        $product->join('cart', 'cart.fk_product_id= product.id');
        $data['ship_info'] = $Shipping_model->where('fk_user_id', $useSessionData['id'])->findAll();
        $data['shipinfo_checkout'] = $Ship_Checkout_model->where('fk_user_id', $useSessionData['id'])->findAll();
        $data['cart_items'] = $product->findAll();
        $data['category'] = $Category_model->findAll();
        
        
         $Account_model = new Account_model();
        $data ['superadminAccounts'] = $Account_model->where('role', 'Superadmin')->findAll();
        
        $cities = $cityModel->findAll();
        $data['cities'] = json_decode(json_encode($cities));
        
        return view('home/order_details', $data);  
    }

    public function cus_checkout($id)
    {
        $Order_model = new Order_model();
        $Order_item_model = new Order_item_model();

        $order_amount = $this->request->getPost('order_amount');
        $proof_payment = $this->request->getPost('proof_payment');
        $order_status = $this->request->getPost('order_status');
        $order_type = $this->request->getPost('order_type');
        $selected_city = $this->request->getPost('city');
        $selected_barangay = $this->request->getPost('barangay');
        $other_infoaddres = $this->request->getPost('otherinfoadd');
        $shipping_fee = $this->request->getPost('shipping_fees');

        if ($order_type === 'Pick Up' || $order_type === 'Pick Up (Paid)') {
            $shipping_fee = 0;
        }

        $data = [
            'order_amount' => $order_amount,
            'proof_payment' => $proof_payment,
            'order_status' => $order_status,
            'order_type' => $order_type,
            'selected_city' => $selected_city,
            'selected_barangay' => $selected_barangay,
            'other_infoaddres' => $other_infoaddres,
            'shipping_fee' => $shipping_fee,
        ];

        $Order_model->update($id, $data);

        $related_items = $Order_item_model->where('fk_order_id', $id)->findAll();

        return redirect()->to('order_success_');
    }

}
