<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Order_model;
use App\Models\Order_Item_model;
use App\Models\Customization;
use App\Models\Review_model;
use App\Models\Booking_model;
use App\Models\Customize_model;


class Orders extends BaseController
{

    public function ordersedit($id){
        $data = [];
        $Order_model = new Order_model();
        $data['order'] = $Order_model->find($id);
        return view('admin/orders/orderlist', $data);
    }

    public function ordersupdate($id)
    {
        $useSessionData = session()->get();

        $order_status = $this->request->getVar('order_status');
        $order_id = $this->request->getVar('order_id');
        $order_amount = $this->request->getVar('order_amount');
        $user_email = $this->request->getVar('user_email');
        $order_type = $this->request->getVar('order_type');
        $firstname = $this->request->getVar('firstname');
        $lastname = $this->request->getVar('lastname');
        $selected_city = $this->request->getVar('selected_city');
        $selected_barangay = $this->request->getVar('selected_barangay');
        $other_infoaddres = $this->request->getVar('other_infoaddres');
        $contact = $this->request->getVar('contact');
        $item_name = $this->request->getVar('item_name');
        $shipping_fee = $this->request->getVar('shipping_fee');
        $flower_sizeOrtype = $this->request->getVar('flower_sizeOrtype');

        
        $Order_model = new Order_model();
        $order = $Order_model->find($id); 

        $data = [
            'order_status' => $order_status,
            'order_amount' => $order_amount
        ];

        $Order_Item_model = new Order_Item_model();
        $orderItems = $Order_Item_model->where('fk_order_id', $order['id'])->findAll();

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
        
        $Order_model->update($id, $data);
        if($flower_sizeOrtype != 'DragNdrop' and $order_status == 'To Pay' and  $order_type == 'COD' ){
            $email = \Config\Services::email();
            $email->setTo($user_email);
            $email->setFrom('bituinflowershop@gmail.com');
            $email->setSubject('Bituin Flower Shop');

            $email->setMailType('html');
            
            $message = view('admin/emails/topay_cod', [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'order_id' => $order_id,
                'item_names' => $item_names,
                'order_amount' => $order_amount,
                'shipping_fee' => $shipping_fee,
                'item_qtys' => $item_qtys,
                'item_amounts' => $item_amounts,
                'selected_city' => $selected_city,
                'selected_barangay' => $selected_barangay,
                'other_infoaddres' => $other_infoaddres,
                'contact' => $contact,
            ]);
    
            $email->setMessage($message);

            if($email->send()){
                return redirect()->to('pendingorders')
                ->with('status_icon', 'success')
                ->with('status', 'Email sent successfully');
            }
        }
        else if($flower_sizeOrtype == 'DragNdrop' and $order_status == 'To Pay' and  $order_type == 'COD' ){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

                $email->setMailType('html');
                
                $message = view('admin/emails/topay_cod_dragdrop', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'item_colors' => $item_colors,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    'flower_sizeOrtype' => $flower_sizeOrtype,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);

                if($email->send()){
                    return redirect()->to('pendingorders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'To Pay' and $order_type == 'Online' and $flower_sizeOrtype != 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

                
                $email->setMailType('html');
                
                $message = view('admin/emails/topay_online', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);        
                if($email->send()){
                    return redirect()->to('pendingorders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($flower_sizeOrtype == 'DragNdrop' and $order_status == 'To Pay' and $order_type == 'Online'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

                $email->setMailType('html');
                
                $message = view('admin/emails/topay_online_dragdrop', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'item_colors' => $item_colors,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    'flower_sizeOrtype' => $flower_sizeOrtype,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);

                if($email->send()){
                    return redirect()->to('pendingorders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'To Pay' and $order_type == 'Pick Up' and $flower_sizeOrtype != 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');
                $email->setMailType('html');
                
                $message = view('admin/emails/topay_pickup', [
                    'firstname' => $firstname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'order_amount' => $order_amount,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                ]);
        
                $email->setMessage($message);          
                if($email->send()){
                    return redirect()->to('pendingorders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if( $order_status == 'To Pay' and $order_type == 'Pick Up' and $flower_sizeOrtype == 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

                $email->setMailType('html');
                
                $message = view('admin/emails/topay_pickup_dragdrop', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'item_colors' => $item_colors,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    'flower_sizeOrtype' => $flower_sizeOrtype,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);

                if($email->send()){
                    return redirect()->to('pendingorders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'To Pay' and $order_type == 'Pick Up (Paid)' and $flower_sizeOrtype != 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');
                $email->setMailType('html');
                
                $message = view('admin/emails/topay_pickup_paid', [
                    'firstname' => $firstname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'order_amount' => $order_amount,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                ]);
        
                $email->setMessage($message);            
                if($email->send()){
                    return redirect()->to('pendingorders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'To Pay' and $order_type == 'Pick Up (Paid)' and $flower_sizeOrtype == 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

                $email->setMailType('html');
                
                $message = view('admin/emails/topay_pickup_paid_dragdrop', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'item_colors' => $item_colors,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    'flower_sizeOrtype' => $flower_sizeOrtype,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);

                if($email->send()){
                    return redirect()->to('pendingorders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'Ready' and $order_type == 'Pick Up' and $flower_sizeOrtype != 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');
                $email->setMailType('html');
                
                $message = view('admin/emails/ready_pickup', [
                    'firstname' => $firstname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'order_amount' => $order_amount,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                ]);
        
                $email->setMessage($message);              
                if($email->send()){
                    return redirect()->to('topay_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'Ready' and $order_type == 'Pick Up' and $flower_sizeOrtype == 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

                $email->setMailType('html');
                
                $message = view('admin/emails/ready_pickup_dragdrop', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'item_colors' => $item_colors,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    'flower_sizeOrtype' => $flower_sizeOrtype,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);

                if($email->send()){
                    return redirect()->to('topay_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'Ready' and $order_type == 'Pick Up (Paid)' and $flower_sizeOrtype != 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');
                $email->setMailType('html');
                
                $message = view('admin/emails/ready_pickup_paid', [
                    'firstname' => $firstname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'order_amount' => $order_amount,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                ]);
        
                $email->setMessage($message);         
                if($email->send()){
                    return redirect()->to('topay_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'Ready' and $order_type == 'Pick Up (Paid)' and $flower_sizeOrtype == 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

                $email->setMailType('html');
                
                $message = view('admin/emails/ready_pickup_paid_dragdrop', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'item_colors' => $item_colors,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    'flower_sizeOrtype' => $flower_sizeOrtype,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);

                if($email->send()){
                    return redirect()->to('topay_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'To Deliver' and $order_type == 'COD' and $flower_sizeOrtype != 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');
                $email->setMailType('html');
                
                $message = view('admin/emails/todeliver_cod', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);        
                if($email->send()){
                    return redirect()->to('topay_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'To Deliver' and $order_type == 'COD' and $flower_sizeOrtype == 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

                $email->setMailType('html');
                
                $message = view('admin/emails/todeliver_cod_dragdrop', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'item_colors' => $item_colors,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    'flower_sizeOrtype' => $flower_sizeOrtype,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);

                if($email->send()){
                    return redirect()->to('topay_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'To Deliver' and $order_type == 'Online' and $flower_sizeOrtype != 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');
                $email->setMailType('html');
                
                $message = view('admin/emails/todeliver_online', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);            
                if($email->send()){
                    return redirect()->to('topay_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'To Deliver' and $order_type == 'Online' and $flower_sizeOrtype == 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

                $email->setMailType('html');
                
                $message = view('admin/emails/todeliver_online_dragdrop', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'item_colors' => $item_colors,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    'flower_sizeOrtype' => $flower_sizeOrtype,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);

                if($email->send()){
                    return redirect()->to('topay_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'Completed' and $order_type == 'Online' and $flower_sizeOrtype != 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');
                $email->setMailType('html');
                
                $message = view('admin/emails/complete_online', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);  
                if($email->send()){
                    return redirect()->to('todeliver_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'Completed' and $order_type == 'Online' and $flower_sizeOrtype == 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

                $email->setMailType('html');
                
                $message = view('admin/emails/complete_online_dragdrop', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'item_colors' => $item_colors,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    'flower_sizeOrtype' => $flower_sizeOrtype,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);

                if($email->send()){
                    return redirect()->to('todeliver_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'Completed' and $order_type == 'COD' and $flower_sizeOrtype != 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');
                $email->setMailType('html');
                
                $message = view('admin/emails/complete_cod', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);  
                if($email->send()){
                    return redirect()->to('todeliver_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'Completed' and $order_type == 'COD' and $flower_sizeOrtype == 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

                $email->setMailType('html');
                
                $message = view('admin/emails/complete_cod_dragdrop', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'item_colors' => $item_colors,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    'flower_sizeOrtype' => $flower_sizeOrtype,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);

                if($email->send()){
                    return redirect()->to('todeliver_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'Completed' and $order_type == 'Pick Up' and $flower_sizeOrtype != 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');
                $email->setMailType('html');
                
                $message = view('admin/emails/complete_pickup_paid', [
                    'firstname' => $firstname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'order_amount' => $order_amount,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                ]);
        
                $email->setMessage($message);  
                if($email->send()){
                    return redirect()->to('pickup_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'Completed' and $order_type == 'Pick Up' and $flower_sizeOrtype == 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

                $email->setMailType('html');
                
                $message = view('admin/emails/complete_pickup_paid_dragdrop', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'item_colors' => $item_colors,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    'flower_sizeOrtype' => $flower_sizeOrtype,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);

                if($email->send()){
                    return redirect()->to('pickup_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'Completed' and $order_type == 'Pick Up (Paid)' and $flower_sizeOrtype == 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

                $email->setMailType('html');
                
                $message = view('admin/emails/complete_pickup_paid_dragdrop', [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'item_colors' => $item_colors,
                    'order_amount' => $order_amount,
                    'shipping_fee' => $shipping_fee,
                    'flower_sizeOrtype' => $flower_sizeOrtype,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'contact' => $contact,
                ]);
        
                $email->setMessage($message);

                if($email->send()){
                    return redirect()->to('pickup_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($order_status == 'Completed' and $order_type == 'Pick Up (Paid)' and $flower_sizeOrtype != 'DragNdrop'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');
                $email->setMailType('html');
                
                $message = view('admin/emails/complete_pickup_paid', [
                    'firstname' => $firstname,
                    'order_id' => $order_id,
                    'item_names' => $item_names,
                    'order_amount' => $order_amount,
                    // 'item_images' => $item_images,
                    'item_qtys' => $item_qtys,
                    'item_amounts' => $item_amounts,
                ]);
        
                $email->setMessage($message);  
                if($email->send()){
                    return redirect()->to('pickup_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            
        return redirect()->to('orderlist')
        ->with('status_icon', 'success')
        ->with('status', 'Updated successfully');  
    }


    public function ordersdelete($id)
    {
        $Order_model = new Order_model();
        $Order_Item_model = new Order_Item_model();

        $Order_model->delete($id);

        $Order_Item_model->where('fk_order_id', $id)->delete();

        return redirect()->to('orderlist')
            ->with('status_icon', 'success')
            ->with('status', 'Order deleted successfully');
    }
    public function pending_orders(){

        $data = [];
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
        $Order_model = new Order_model();
        $Review_model = new Review_model();
        $Booking_model = new Booking_model();
        $Customize_model = new Customize_model();
        $Order_Item_model = new Order_Item_model();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();

        $user_info = [
            'firstname' => session()->get('firstname'),
            'lastname' => session()->get('lastname'),
            'email' => session()->get('email'),
            'phone' => session()->get('phone'),
            'address' => session()->get('address'),
            'password' => session()->get('password'),
        ];

        $orders = $Order_model->where('order_status', 'Pending')
        ->orWhere('order_status', 'Request')
        ->orWhere('order_status', 'Settle')
        ->orWhere('order_status', 'Agree')
        ->select("DATE_FORMAT(order_date, '%M %e, %Y') AS order_date_formatted, orderdata.*")
        ->findAll();

        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();
        $newcomment = $Review_model->where('status', 'Pending')->findAll();
        $newBooking = $Booking_model->where('status', 'Pending')->findAll();

        $data=[
            'orders' => $orders,
            'newOrders' => $newOrders,
            'newcomment' => $newcomment,
            'newBooking' => $newBooking,
            'Order_Item_model' => $Order_Item_model,
            'user_info' => $user_info,
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('admin/orders/pending_orders', $data);
    }

    public function todeliver_orders(){
        $data = [];

        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }

        $Order_model = new Order_model();
        $Review_model = new Review_model();
        $Booking_model = new Booking_model();

        $user_info = [
            'firstname' => session()->get('firstname'),
            'lastname' => session()->get('lastname'),
            'email' => session()->get('email'),
            'phone' => session()->get('phone'),
            'address' => session()->get('address'),
            'password' => session()->get('password'),
        ];
       
        $orders = $Order_model->where('order_status', 'To Deliver')
        ->select("DATE_FORMAT(order_date, '%M %e, %Y') AS order_date_formatted, orderdata.*")
        ->findAll();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();
        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();
        $newcomment = $Review_model->where('status', 'Pending')->findAll();
        $newBooking = $Booking_model->where('status', 'Pending')->findAll();

        $data=[
            'orders' => $orders,
            'newOrders' => $newOrders,
            'newcomment' => $newcomment,
            'newBooking' => $newBooking,
            'user_info' => $user_info,
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('admin/orders/todeliver_orders', $data);
    }

    public function topay_orders(){
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
            'lastname' => session()->get('lastname'),
            'email' => session()->get('email'),
            'phone' => session()->get('phone'),
            'address' => session()->get('address'),
            'password' => session()->get('password'),
        ];
       
        $orders = $Order_model->where('order_status', 'To Pay')
        ->select("DATE_FORMAT(order_date, '%M %e, %Y') AS order_date_formatted, orderdata.*")
        ->findAll();

        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();
        $newcomment = $Review_model->where('status', 'Pending')->findAll();
        $newBooking = $Booking_model->where('status', 'Pending')->findAll();

        $data=[
            'orders' => $orders,
            'newOrders' => $newOrders,
            'newcomment' => $newcomment,
            'newBooking' => $newBooking,
            'user_info' => $user_info,
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('admin/orders/topay_orders', $data);
    }

    public function pick_up_orders(){
        $data = [];
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }

        $Order_model = new Order_model();
        $Review_model = new Review_model();
        $Booking_model = new Booking_model();

        $user_info = [
            'firstname' => session()->get('firstname'),
            'lastname' => session()->get('lastname'),
            'email' => session()->get('email'),
            'phone' => session()->get('phone'),
            'address' => session()->get('address'),
            'password' => session()->get('password'),
        ];
       
        $orders = $Order_model->where('order_status', 'Ready')
        ->select("DATE_FORMAT(order_date, '%M %e, %Y') AS order_date_formatted, orderdata.*")
        ->findAll();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();

        $newOrders = $Order_model->whereIn('order_status', ['Pending', 'Settle', 'Request', 'Agree'])->findAll();
        $newcomment = $Review_model->where('status', 'Pending')->findAll();
        $newBooking = $Booking_model->where('status', 'Pending')->findAll();

        $data=[
            'orders' => $orders,
            'newOrders' => $newOrders,
            'newcomment' => $newcomment,
            'newBooking' => $newBooking,
            'user_info' => $user_info,
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('admin/orders/pick_up_orders', $data);
    }
    public function editorders($orderId)
    {
        $orderModel = new Order_model();
        $orderItemModel = new Order_Item_model();

        $order = $orderModel->find($orderId);

        if (!$order) {
        }

        $orderItems = $orderItemModel->where('fk_order_id', $orderId)->findAll();

        return view('admin/orders/order_receipt', [
            'order' => $order,
            'orderItems' => $orderItems
        ]);
    }

    public function orderscancel($id)
    {
        $useSessionData = session()->get();

        $order_status='Cancelled';
        
        $Order_model = new Order_model();

        $data = [
            'order_status' => $order_status
        ];
        
        $Order_model->update($id, $data);
        
        return redirect()->to('orders')
        ->with('status_icon', 'success')
        ->with('status', 'Order is Cancelled');  
    }
    
}
  