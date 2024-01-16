<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Account_model;

class Account extends BaseController
{
    public function signin()
    {
        helper(['form']);
        $data = [];
        
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
    
        if($this->request->getMethod() == 'post')
        {
            $validation = [
                'email' => 'required|valid_email|is_not_unique[user.email]',
                'password' => 'required',
            ];
            $errors = [
                'email' => [
                    'required' => 'The email is required.',
                    'valid_email' => 'Please check the Email field. It does not appear to be valid',
                    'is_not_unique' => 'Email does not exist',
                ],
                'password' => [
                    'required' => 'The password is required',
                ]
            ];
            if(!$this->validate($validation, $errors))
            {
                $data['validation'] = $this->validator;
            } else {
                $session = session();
                $model = new Account_model();
                $user = $model->where('email', $this->request->getVar('email'))->first();
                if($this->verifyMypassword($this->request->getVar('password'), $user['password']))
                {
                    if($user['status'] == 'verified') {
                        if ($user['role'] == 'Superadmin') {
                            $this->setSuperAdminSession($user); // Set Admin session
                            return redirect()->to('dashboard');
                        } elseif ($user['role'] == 'Admin') {
                            $this->setAdminSession($user); // Set Admin session
                            return redirect()->to('dashboard');
                        } elseif ($user['role'] == 'User') {
                            $this->setUserSession($user); // Set User session
                            return redirect()->to('home');
                        } elseif ($user['role'] == 'Employee'){
                            // Redirect to home for other roles
                            $this->setEmployeeSession($user); // Set User session
                            return redirect()->to('to_pay_orders');
                        }
                    } else {
                        $session->setFlashdata('msg', 'Account not yet verified. Kindly check your email for link verification.');
                        return redirect()->back();
                    }
                } else {
                    $session->setFlashdata('msg', 'Invalid Password');
                    $data['Flash_message'] = true;
                }
            }
        }
        return view('home/signin', $data);
    }
    

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'phone' => $user['phone'],
            'address' => $user['address'],
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }

    private function setAdminSession($admin)
    {
        $data = [
            'admin_id' => $admin['id'],
            'firstname' => $admin['firstname'],
            'lastname' => $admin['lastname'],
            'email' => $admin['email'],
            'phone' => $admin['phone'],
            'address' => $admin['address'],
            'isLoggedIn' => true,
            'isAdmin' => true,
        ];
        session()->set($data);
    }

    private function setSuperAdminSession($superadmin)
    {
        $data = [
            'superadmin_id' => $superadmin['id'],
            'firstname' => $superadmin['firstname'],
            'lastname' => $superadmin['lastname'],
            'email' => $superadmin['email'],
            'phone' => $superadmin['phone'],
            'address' => $superadmin['address'],
            'isLoggedIn' => true,
            'isSuperAdmin' => true,
        ];
        session()->set($data);
    }

    private function setEmployeeSession($employee_data)
    {
        $data = [
            'employee_id' => $employee_data['id'],
            'firstname' => $employee_data['firstname'],
            'lastname' => $employee_data['lastname'],
            'email' => $employee_data['email'],
            'phone' => $employee_data['phone'],
            'address' => $employee_data['address'],
            'isLoggedIn' => true,
            'isEmployee' => true,
        ];
        session()->set($data);
    }
    
    private function verifyMyPassword($enterpassword, $databasePassword)
    {   
        return password_verify($enterpassword, $databasePassword);
    }

    public function signup()
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
                $token = $this->token(100);
                $firstname = $this->request->getVar('firstname');
                $lastname = $this->request->getVar('lastname');
                $user_email = $this->request->getVar('email');
                $phone = $this->request->getVar('phone');
                $address = $this->request->getVar('address');
                $password = $this->request->getVar('password');
                
                $data = [
                    'firstname' => $firstname,
                    'role' => 'User',
                    'lastname' => $lastname,
                    'email' =>$user_email,
                    'phone' => $phone,
                    'address' => $address,
                    'password' => $password,
                    'token' => $token,
                    'status' => 'not_verified',
                ];
                if($model->save($data))
                {
                    $email = \Config\Services::email();
                    $email->setTo($user_email);
                    $email->setFrom('bituinflowershop@gmail.com');
                    $email->setSubject('Account Activation');
            
                    $email->setMailType('html');
                    
                    $message = view('admin/emails/account_activation', [
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'user_email' => $user_email,
                        'phone' => $phone,
                        'address' => $address,
                        'token' => $token
                    ]);
                    $email->setMessage($message); 
                    if($email->send()){
                    return redirect()->to('signin')
                    ->with('status_icon', 'success')    
                    ->with('status', 'Registration successful! Please check your email inbox for account activation.');
                }
            }
            }
        }
        return view('home/signup', $data);
    }

    public function sendMail($to, $subject, $message)
    {
        $to = $to;
        $subject = $subject;
        $message = $message;
        $headers = 'MIME-Version:1.0' . "\r\n";
        $headers = 'Content-type: text/html; charset=iso8859-1' . "\r\n";
        $email = \Config\Services::email();
        $email-> setMailType("html");   
        $email->setTo($to);
        $email->setFrom('bituinflowershop@gmail.com', $subject);
        $email->setMessage($message);
        if($email->send()){
            echo 'Email Sent Successfully';
        } else{
            $data = $email->printDebugger(['headers']);
            print($data);
        }
    }

    public function token($length)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result),0, $length);
    }

    public function verify_account($id = null)
    {
        $account_model = new Account_model();
        $account = $account_model->where('token', $id)->first();
        if($account_model){
            $data = [
                'token' => $this->token(100),
                'status' => 'verified'
            ];
            $account_model->set($data)->where('token', $id)->update();
            $session = session();
            return redirect()->to('signin')
            ->with('status_icon', 'success')    
            ->with('status', 'Account has been verified');
        }else{
            $session->setFlashdata('msg', 'Invalid Link');
        }
        
        return redirect('signin');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function forgotpassword()
    {
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
        return view('admin/forgot_password');
    }

    public function sendResetLink()
    {
        $email = $this->request->getVar('email');

        $accountModel = new Account_model();
        $user = $accountModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('status_icon', 'warning')
            ->with('status', 'No account found');
        }

        $tokens = bin2hex(random_bytes(32));

        $user['tokens'] = $tokens;
        $accountModel->save($user);

        $resetLink = site_url('reset-password/' . $tokens);
        $emailSubject = 'Reset Password';

        $email = \Config\Services::email();
        $email->setTo($user['email']);
        $email->setFrom('bituinflowershop@gmail.com');
        $email->setSubject($emailSubject);
        $email->setMailType('html');
        
        $message = view('admin/emails/resetpassword', [
            'resetLink' => $resetLink,
        ]);

        $email->setMessage($message);  

        if ($email->send()) {
            return redirect()->back()->with('status_icon', 'success')
            ->with('status', 'Reset link sent to your email');
        } else {
            $error = $email->printDebugger(['headers']);
            return redirect()->back()->with('error', 'Failed to send reset link: ' . $error);
        }
    }

    public function resetPassword($tokens)
    {
        $accountModel = new Account_model();
        $user = $accountModel->where('tokens', $tokens)->first();

        if (!$user) {
            return redirect()->back() 
            ->with('status_icon', 'warning')
            ->with('status', 'Expired Link');
        }

        return view('admin/reset_password', ['tokens' => $tokens]);
    }

    public function updatePassword()
    {
        $tokens = $this->request->getPost('tokens');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');
    
        if ($password !== $confirmPassword) {
            return redirect()->back()->with('error', 'Passwords do not match');
        }
    
        if (strlen($password) < 8 || !preg_match('/[a-zA-Z]/', $password) || !preg_match('/\d/', $password)) {
            return redirect()->back()->with('error', 'Password must be at least 8 characters long and contain both letters and numbers');
        }
    
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
        $accountModel = new Account_model();
        $user = $accountModel->where('tokens', $tokens)->first();
    
        if (!$user) {
            return redirect()->back()
                ->with('status_icon', 'warning')
                ->with('status', 'Expired Link');
        }
    
        $user['password'] = $hashedPassword;
        $user['tokens'] = null; 
    
        $accountModel->save($user);
    
        return redirect()->to('signin')
            ->with('status_icon', 'success')
            ->with('status', 'Password Changed');
    }
    
    public function saveUser()
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
                return redirect()->to('my_account')->with('success', 'Data updated successfully.');
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
                return redirect()->to('my_account')->with('error', 'Password do not match');
            }

            if (!$isPasswordEmpty && !preg_match('/^(?=.*[A-Za-z])(?=.*\d).{8,}$/', $password)) {
                return redirect()->to('my_account')->with('error', 'Password must be 8 characters long and contain both letters and numbers.');
            }

            $existingUserByEmail = $accountModel->where('email', $emails)->first();

    
            if ($existingUserByEmail && $existingUserByEmail['id'] !== $id) {
                return redirect()->to('my_account')->with('error', 'Email is already in use.');
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
                        return redirect()->to('my_account')->with('success', 'Data updated successfully.');
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
    
                        return $this->sendOtpEmail($email, $otp, $emailData); 
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
    
                    return $this->sendOtpEmail($emails, $otp, $emailData); 
                }
            } else {
                return redirect()->to('my_account')->with('error', 'User not found for the specified ID.');
            }
        }
    }
    private function generateOtp()
    {
        return strval(mt_rand(100000, 999999));
    }
    
    private function sendOtpEmail($emails, $otp, $data)
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
            return view('home/otp_verification', ['email' => $emails, 'id' => $data['id'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname'],'phone' => $data['phone'],'password' => $data['password'],'address' => $data['address'],'email' => $data['email']]);
        } else {
            return view('home/otp_verification', ['email' => $emails, 'id' => $data['id'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname'],'phone' => $data['phone'],'password' => $data['password'],'address' => $data['address'],'email' => $data['email']]);
        }
    }
    
    
    public function verifyOtp()
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
                return redirect()->to('my_account')->with('success', 'Data updated successfully.');
            } else {
                return redirect()->to('my_account')->with('error', 'Invalid OTP. Please try again.');
            }
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function saveAdmin()
    {
        $email = service('email');
        $accountModel = new Account_model();
    
        if ($this->request->getMethod() === 'post') {
            $validation = [
                'gcash_qr' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[gcash_qr]|is_image[gcash_qr]|mime_in[gcash_qr,image/jpg,image/jpeg,image/png]'
                ],
                'signature_image' => [
                    'label' => 'Signature Image File',
                    'rules' => 'uploaded[signature_image]|is_image[signature_image]|mime_in[signature_image,image/jpg,image/jpeg,image/png]'
                ]
            ];
        
            if (!$this->validate($validation)) {
                $data['validation'] = $this->validator;
            } else {
                $gcashQrFile = $this->request->getFile('gcash_qr');
                $signatureFile = $this->request->getFile('signature_image');
        
                if ($gcashQrFile->isValid() && !$gcashQrFile->hasMoved() && $signatureFile->isValid() && !$signatureFile->hasMoved()) {
                    $uploadGcashQr = $gcashQrFile->getRandomName();
                    $uploadSignature = $signatureFile->getRandomName();
        
                    $gcashQrFile->move('public/superadmin_gcash/', $uploadGcashQr);
                    $signatureFile->move('public/signature_images/', $uploadSignature);
                }
            }
        
            $id = $this->request->getPost('id');
            $emails = $this->request->getPost('email');
            $password = $this->request->getPost('password');
        
            if (isset($uploadGcashQr) && isset($uploadSignature)) {
                $dataToUpdate = [
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                    'phone' => $this->request->getPost('phone'),
                    'address' => $this->request->getPost('address'),
                    'gcash_no' => $this->request->getPost('gcash_no'),
                    'gcash_qr' => $uploadGcashQr,
                    'signature_image' => $uploadSignature,
                ];
            
                $accountModel->update($id, $dataToUpdate);
                return redirect()->to('admin_profile')->with('success', 'Data updated successfully.');
            } else {
                // Check if both email and password are empty
                if (empty($emails) && empty($password)) {
                    // If both are empty, skip OTP verification
                    $dataToUpdate = [
                        'firstname' => $this->request->getPost('firstname'),
                        'lastname' => $this->request->getPost('lastname'),
                        'address' => $this->request->getPost('address'),
                        'phone' => $this->request->getPost('phone'),
                        'gcash_no' => $this->request->getPost('gcash_no'),
                    ];
            
                    $accountModel->update($id, $dataToUpdate);
                    return redirect()->to('admin_profile')->with('success', 'Data updated successfully.');
                }
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
                return redirect()->to('admin_profile')->with('error', 'Password do not match');
            }

            if (!$isPasswordEmpty && !preg_match('/^(?=.*[A-Za-z])(?=.*\d).{8,}$/', $password)) {
                return redirect()->to('my_account')->with('error', 'Password must be 8 characters long and contain both letters and numbers.');
            }

            $existingUserByEmail = $accountModel->where('email', $emails)->first();
    
            if ($existingUserByEmail && $existingUserByEmail['id'] !== $id) {
                return redirect()->to('admin_profile')->with('error', 'Email is already in use.');
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
                        return redirect()->to('admin_profile')->with('success', 'Data updated successfully.');
                    } else {
                        if ($isPasswordEmpty) {
                            $dataToUpdate = [
                                'email' => $emails,
                                'firstname' => $firstname,
                                'lastname' => $lastname,
                                'phone' => $phone,
                                'address' => $address,
                                'gcash_no' => $gcash_no,
                            ];
    
                        $otp = $this->generateOtp();
                        $dataToUpdate = [
                            'otp' => $otp,
                        ];
                        $accountModel->update($id, $dataToUpdate);
    
                        return $this->sendAdminOtpEmail($email, $otp, $emailData);
                    }
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
    
                    return $this->sendAdminOtpEmail($emails, $otp, $emailData);
                }
            } else {
                return redirect()->to('admin_profile')->with('error', 'User not found for the specified ID.');
            }
        }
    }
    
    
        
        
    public function verifyAdminOtp()
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
                return redirect()->to('admin_profile')->with('success', 'Data updated successfully.');
            } else {
                return redirect()->to('admin_profile')->with('error', 'Invalid OTP. Please try again.');
            }
        }
    }

    
    private function sendAdminOtpEmail($emails, $otp, $data)
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
            return view('admin/admin_otp', ['email' => $emails, 'id' => $data['id'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname'],'phone' => $data['phone'],'password' => $data['password'],'address' => $data['address'],'email' => $data['email']]);
        } else {
            return view('admin/admin_otp', ['email' => $emails, 'id' => $data['id'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname'],'phone' => $data['phone'],'password' => $data['password'],'address' => $data['address'],'email' => $data['email']]);
        }
    }
    
}