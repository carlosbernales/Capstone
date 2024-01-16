<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Employee_model;
use App\Models\Order_model;
use App\Models\Account_model;
use App\Models\Order_Item_model;

class Employee extends BaseController
{
    // public function employee_login()
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
    //     if($this->request->getmethod()=='post')
    //     {
    //         $validation = [
    //             'username' => 'required|is_not_unique[employee.username]',
    //             'password' => 'required',
    //         ];
    //         $errors = [
    //             'username' => [
    //                 'required' => 'The username is required.',
    //                 'is_not_unique' => 'Username does not exist',
    //             ],
    //             'password' => [
    //                 'password' => 'The password is required',
    //             ]
                
    //         ];
    //         if(!$this->validate($validation, $errors))
    //         {
    //             $data['validation'] = $this->validator;
    //         }else{
    //             $session = session();
    //             $Employee_model = new Employee_model();
    //             $user = $Employee_model->where('username', $this->request->getVar('username'))->first();
    //             if($user['confirmation_status'] == 'Approved'){
    //                 if($user){
    //                     if($this->verifyMypassword($this->request->getVar('password'), $user['password'])){
    //                         $this->setEmployeeSession($user);
    //                         return redirect()->to('to_pay_orders');
    //                     }else{
    //                         $session->setFlashdata('msg', 'Password is incorrect, try again.');
    //                     }
    //                 }else{
    //                     $session->setFlashdata('msg', 'Username is incorrect, try again.');
    //                 }
    //             }else{
    //                 $session->setFlashdata('msg', 'Account has not yet approve by the admin.');
    //                 return redirect()->back();
    //             }
    //         }
    //     }
    //     return view('employee/employee_login', $data);
    // }

    // private function setEmployeeSession($employee_data)
    // {
    //     $data = [
    //         'employee_id' => $employee_data['id'],
    //         'username' => $employee_data['username'],
    //         'email' => $employee_data['email'],
    //         'phone' => $employee_data['phone'],
    //         'address' => $employee_data['address'],
    //         'isLoggedIn' => true,
    //         'isEmployee' => true,
    //     ];
    //     session()->set($data);
    // }
    public function employee_register()
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
                    'role' => 'Employee',
                );
                if($model->save($data))
                {
                    return redirect()->to('signin')
                    ->with('status_icon', 'success')    
                    ->with('status', 'Wait till the admin approve your request');
                }
            }
        }
        return view('employee/employee_register', $data);
    }

    
    
    private function verifyMyPassword($enterpassword, $databasePassword)
    {   
        return password_verify($enterpassword, $databasePassword);
    }

    public function employee_logout()
    {
        session()->destroy();
        return redirect()->to('employee_login');
    }

    public function to_pay_orders(){
        $data = [];

        if (!session()->get('isLoggedIn') || !session()->get('isEmployee')) {
            return redirect()->to('/'); 
        }
        $Order_model = new Order_model();

        $orders = $Order_model->where('order_status', 'To Pay')->whereIn('order_type', ['COD', 'Online'])
        ->select("DATE_FORMAT(order_date, '%M %e, %Y') AS order_date_formatted, orderdata.*")
        ->findAll();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')
        ->whereIn('order_type', ['COD', 'Online'])->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')
        ->whereIn('order_type', ['COD', 'Online'])->findAll();

        $data = [
            'orders' => $orders,
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];

        return view('employee/to_pay_orders', $data);
    }

    public function to_delivery_orders(){
        $data = [];
        if (!session()->get('isLoggedIn') || !session()->get('isEmployee')) {
            return redirect()->to('/'); 
        }
        $Order_model = new Order_model();

        $orders = $Order_model->where('order_status', 'To Deliver')->whereIn('order_type', ['COD', 'Online'])
        ->select("DATE_FORMAT(order_date, '%M %e, %Y') AS order_date_formatted, orderdata.*")
        ->findAll();
        
        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')
        ->whereIn('order_type', ['COD', 'Online'])->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')
        ->whereIn('order_type', ['COD', 'Online'])->findAll();
        $data = [
            'orders' => $orders,
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];

        return view('employee/to_delivery_orders', $data);
    }

    public function completed_orders(){
        $data = [];
        if (!session()->get('isLoggedIn') || !session()->get('isEmployee')) {
            return redirect()->to('/'); 
        }
        $Order_model = new Order_model();

        $orders = $Order_model->whereIn('order_status', ['Completed', 'Received'])->whereIn('order_type', ['COD', 'Online'])
        ->select("DATE_FORMAT(order_date, '%M %e, %Y') AS order_date_formatted, orderdata.*")
        ->findAll();

        
        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')
        ->whereIn('order_type', ['COD', 'Online'])->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')
        ->whereIn('order_type', ['COD', 'Online'])->findAll();

        $data = [
            'orders' => $orders,
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('employee/completed_orders', $data);

    }

    public function employee_orders_edit($id){
        $data = [];
        $Order_model = new Order_model();
        $data['orders'] = $Order_model->find($id);
        return view('employee/orders_edit', $data);
    }

    public function employee_orders_update($id)
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
            
        if($order_status == 'To Deliver' and $order_type == 'COD' and $flower_sizeOrtype != 'DragNdrop'){
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
                    return redirect()->to('to_pay_orders')
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
                    return redirect()->to('to_pay_orders')
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
                    return redirect()->to('to_pay_orders')
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
                    return redirect()->to('to_pay_orders')
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
                    return redirect()->to('to_delivery_orders')
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
                    return redirect()->to('to_delivery_orders')
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
                    return redirect()->to('to_delivery_orders')
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
                    return redirect()->to('to_delivery_orders')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
        return redirect()->to('to_pay_orders')
        ->with('status_icon', 'success')
        ->with('status', 'Order has been updated successfully');  
    }

    public function update_employee($id) {
        $useSessionData = session()->get();

        $emailAddress = $this->request->getPost('email');
        $status = $this->request->getPost('status');
        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        $phone = $this->request->getPost('phone');
        $address = $this->request->getPost('address');
    
        $Account_model = new Account_model();
        $employee = $Account_model->find($id);
    
        $data = [
            'status' => $this->request->getVar('status'),
        ];
        $Account_model->update($id, $data);
    
    
        if ($status == 'verified') {
            $email = \Config\Services::email();
            $email->setTo($emailAddress);
            $email->setFrom('bituinflowershop@gmail.com');
            $email->setSubject('Bituin Flower Shop');

            
            $email->setMailType('html');
            
            $message = view('admin/emails/employee_approve', [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'user_email' => $emailAddress,
                'phone' => $phone,
                'address' => $address
            ]);
             $email->setMessage($message);  
    
            if ($email->send()) {
                return redirect()->to('employeelist')
                    ->with('status_icon', 'success')
                    ->with('status', 'Account has been approved successfully');
            }
        }
    
        return redirect()->to('admins')
            ->with('status_icon', 'success')
            ->with('status', 'Status updated successfully');
    }


    public function employee_profile(){
        $data = [];

        $useSessionData = session()->get();

        if (!session()->get('isLoggedIn') || !session()->get('isEmployee')) {
            return redirect()->to('/'); 
        }
        $Order_model = new Order_model();
        $Account_model = new Account_model();

        $orders = $Order_model->where('order_status', 'To Pay')->whereIn('order_type', ['COD', 'Online'])
        ->select("DATE_FORMAT(order_date, '%M %e, %Y') AS order_date_formatted, orderdata.*")
        ->findAll();

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')
        ->whereIn('order_type', ['COD', 'Online'])->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')
        ->whereIn('order_type', ['COD', 'Online'])->findAll();

        $userId = session()->get('isEmployee') ? $useSessionData['employee_id'] : null;

        $userData = $Account_model->find($userId);

        $data = [
            'orders' => $orders,
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders,
            'userData' => $userData
        ];

        return view('employee/employee_profile', $data);
    }

    public function saveEmployee()
    {
        $email = service('email');
        $accountModel = new Account_model();
    
        if ($this->request->getMethod() === 'post') {
            $id = $this->request->getPost('id');
            $emails = $this->request->getPost('email');
            $password = $this->request->getPost('password');
    
            // Check if both email and password are empty
            if (empty($emails) && empty($password)) {
                // If both are empty, skip OTP verification
                $dataToUpdate = [
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                    'phone' => $this->request->getPost('phone'),
                    'address' => $this->request->getPost('address'),
                ];
    
                $accountModel->update($id, $dataToUpdate);
                return redirect()->to('myprofile')->with('success', 'Data updated successfully.');
            }
            $emails = $this->request->getPost('email');
    
            $change_email = $this->request->getPost('change_email');
            $firstname = $this->request->getPost('firstname');
            $lastname = $this->request->getPost('lastname');
            $phone = $this->request->getPost('phone');
            $address = $this->request->getPost('address');
            $confirmPassword = $this->request->getPost('confirm_password');
    
            $isPasswordEmpty = empty($password);
    
            if (!$isPasswordEmpty && $password !== $confirmPassword) {
                return redirect()->to('myprofile')->with('error', 'Password do not match');
            }
            
            if (!$isPasswordEmpty && !preg_match('/^(?=.*[A-Za-z])(?=.*\d).{8,}$/', $password)) {
                return redirect()->to('myprofile')->with('error', 'Password must be 8 characters long and contain both letters and numbers.');
            }
            
            $existingUserByEmail = $accountModel->where('email', $emails)->first();

    
            if ($existingUserByEmail && $existingUserByEmail['id'] !== $id) {
                return redirect()->to('myprofile')->with('error', 'Email is already in use.');
            }
    
            $existingUser = $accountModel->find($id);
    
            if ($existingUser) {
                if ($existingUser['email'] === $email) {
                    if ($isPasswordEmpty) {
                        $dataToUpdate = [
                            'email' => $emails,
                            'firstname' => $firstname,
                            'lastname' => $lastname,
                            'phone' => $phone,
                            'address' => $address,
                        ];
    
                        $accountModel->update($id, $dataToUpdate);
                        return redirect()->to('myprofile')->with('success', 'Data updated successfully.');
                    } else {
                        $emailData = [
                            'id' => $id,
                            'email' => $emails, 
                            'firstname' => $firstname,
                            'lastname' => $lastname,
                            'phone' => $phone,
                            'address' => $address,
                            'password' => $password,
                        ];
    
                        $otp = $this->generateOtp();
                        $dataToUpdate = [
                            'otp' => $otp,
                        ];
                        $accountModel->update($id, $dataToUpdate);
    
                        return $this->sendEmployeeOtpEmail($email, $otp, $emailData); 
                    }
                } else {
                    $emailData = [
                        'id' => $id,
                        'change_email' => $change_email, 
                        'email' => $emails,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'phone' => $phone,
                        'address' => $address,
                        'password' => $password,
                    ];
    
                    $otp = $this->generateOtp();
                    $dataToUpdate = [
                        'otp' => $otp,
                    ];
                    $accountModel->update($id, $dataToUpdate);
    
                    return $this->sendEmployeeOtpEmail($emails, $otp, $emailData); 
                }
            } else {
                return redirect()->to('myprofile')->with('error', 'User not found for the specified ID.');
            }
        }
    }
    private function generateOtp()
    {
        return strval(mt_rand(100000, 999999));
    }
    
    private function sendEmployeeOtpEmail($emails, $otp, $data)
    {
        $email = \Config\Services::email();
        $email->setFrom('bituinflowershop@gmail.com');
    
    
        $email->setTo($emails);
    
        $email->setSubject('Your OTP for verification');
                    
                    $email->setMailType('html');
                    
                    $message = view('admin/emails/my_account_otp', [
                        'otp' => $otp
                    ]);
            
                    $email->setMessage($message); 
    
        if ($email->send()) {
            return view('employee/employee_otp', ['email' => $emails, 'id' => $data['id'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname'],'phone' => $data['phone'],'password' => $data['password'],'address' => $data['address'],'email' => $data['email']]);
        } else {
            return view('employee/employee_otp', ['email' => $emails, 'id' => $data['id'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname'],'phone' => $data['phone'],'password' => $data['password'],'address' => $data['address'],'email' => $data['email']]);
        }
    }
    
    
    public function verifyEmployeeOtp()
    {
        $accountModel = new Account_model();
    
        if ($this->request->getMethod() === 'post') {
            $id = $this->request->getPost('id');
            $otp = $this->request->getPost('otp');
            $email = $this->request->getPost('email');
            $firstname = $this->request->getPost('firstname');
            $lastname = $this->request->getPost('lastname');
            $phone = $this->request->getPost('phone');
            $address = $this->request->getPost('address');
            $password = $this->request->getPost('password');
    
            $existingUser = $accountModel->find($id);

            if ($existingUser && $existingUser['otp'] === $otp) {
                $dataToUpdate = [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'phone' => $phone,
                    'address' => $address,
                    'email' => $email,
                    'otp' => null,
                ];

                // Check if the password is not empty before updating it
                if (!empty($password)) {
                    $dataToUpdate['password'] = password_hash($password, PASSWORD_BCRYPT);
                }
                
    
                $accountModel->update($id, $dataToUpdate);
                return redirect()->to('myprofile')->with('success', 'Data updated successfully.');
            } else {
                return redirect()->to('myprofile')->with('error', 'Invalid OTP. Please try again.');
            }
        }
    }


   

}