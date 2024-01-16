<?php

namespace App\Controllers;
use App\Models\Account_model;
use App\Models\Booking_model;
use App\Models\Cart_model;
use App\Models\Product_model;
use App\Models\Category_model;
use App\Models\Payment_model;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Booking extends BaseController
{

    public function __construct()
    {
        helper(['form']);
    }

    public function book_now()
    { 
        $data = [];
        helper(['form']);
        $useSessionData = session()->get();

        if (empty($useSessionData['id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
        

        $Booking_model = new Booking_model();
        $Product_model = new Product_model();
        $Category_model = new Category_model();
        
        $data = [
            'cart_items' => $Product_model
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
            ->findAll(),
        ];
        if($this->request->getmethod()=='post')
        {
            $validation = [
                'fullname' => 'required',
                'contact' => 'required',
                'email' => 'required',
                'location' => 'required',
                'date' => 'required',
                'start' => 'required',
            ];
            $errors = [
                'fullname' => [
                    'required' => 'This field is required.',
                ],
                'contact' => [
                    'required' => 'This field is required.',
                ],
                'email' => [
                    'required' => 'This field is required.',
                ],
                'location' => [
                    'required' => 'This field is required.',
                ],
                'date' => [
                    'required' => 'This field is required.',
                ],
                'start' => [
                    'required' => 'This field is required.',
                ]
            ];
            if(!$this->validate($validation, $errors)){
                $data['validation'] = $this->validator;
            }else{

                $booking_data = [
                    'fk_userid' => $useSessionData['id'],
                    'fullname' => $this->request->getVar('fullname'),
                    'contact' => $this->request->getVar('contact'),
                    'email' => $this->request->getVar('email'),
                    'location' => $this->request->getVar('location'),
                    'date' => $this->request->getVar('date'),
                    'start' => $this->request->getVar('start'),
                    'payment_amount' => $this->request->getVar('payment_amount'),
                    'balance' => $this->request->getVar('balance'),
                    'status' => $this->request->getVar('status')
                ];

                $existingBooking = $Booking_model
                ->where('date', $this->request->getVar('date'))
                ->where('status', 'Approved')
                ->first();

            if ($existingBooking) {
                // Calculate 4 hours after the existing start time
                $existingStartTime = strtotime($existingBooking['start']);
                $newStartTime = strtotime($this->request->getVar('start'));
                $fourHoursAfterExistingStart = strtotime('+4 hours', $existingStartTime);

                if ($newStartTime < $fourHoursAfterExistingStart) {
                    // Display a Sweet Alert error message
                
                          return redirect()->to('book_now')
                          ->with('status_icon', 'warning')
            ->with('status', 'Start time should be at least 4 hours before and after the existing booking start time on this date.');;
                }
            }
                
            $Booking_model->save($booking_data);
            return redirect()->to('my_booking')
            ->with('status_icon', 'success')
            ->with('status', 'Booking has been placed successfully');
            }
        }
        $data['approved'] = $Booking_model->where('status', 'Approved')->findAll();
        $data['booked_dates'] = $Booking_model->getBookedDates();
        $data['category'] = $Category_model->findAll();


        return view('home/bookings/book_now', $data);
    }

    public function my_booking()
    {  
        $data = [];
        $useSessionData = session()->get();

        if (empty($useSessionData['id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
        
        $Account_model = new Account_model();
        $Booking_model = new Booking_model();
        $Product_model = new Product_model();
        $Cart_model = new Cart_model();
        $Category_model = new Category_model();
        
        $Product_model->select('product.id,
        product.product_name,
        product.product_des,
        product.product_qty as productquantity,
        product.product_image,
        product.product_price,
        cart.id as Cartid,
        cart.fk_product_id,
        cart.fk_user_id,
        cart.cart_qty as CartQty,
        cart.cart_cost');
        $Product_model->where('cart.fk_user_id', $useSessionData['id']);
        $Product_model->join('cart', 'cart.fk_product_id = product.id');
        $data['cart_items'] = $Product_model->findAll();
        $data['bookdetails'] = $Booking_model->where('fk_userid', $useSessionData['id'])->findAll();
        $data['completed'] = $Booking_model->where('fk_userid', $useSessionData['id'])->where('status', 'Finished')->findAll();
        $data['booking_counts'] = $Booking_model->findAll();
        $data['category'] = $Category_model->findAll();
        $data ['superadminAccounts'] = $Account_model->where('role', 'Superadmin')->findAll();

        return view('home/bookings/my_booking', $data);
    }




    public function updatereservation($id)
    {
        $id = $this->request->getPost('id');
        $fullname = $this->request->getPost('fullname');
        $contact = $this->request->getPost('contact');
        $user_email = $this->request->getPost('email');
        $location = $this->request->getPost('location');
        $date = $this->request->getPost('date');
        $start = $this->request->getPost('start');
        $status = $this->request->getPost('status');
        $balance = $this->request->getPost('balance');

        $startFormatted = date("h:i A", strtotime($start));

        $Booking_model = new Booking_model();

        $data = [
        'status' => $status,
        'balance' => $balance
        ];
        $Booking_model->update($id, $data);
        $status = $this->request->getPost('status');
        if($status == 'Approved'){
            $email = \Config\Services::email();
            $email->setTo($user_email);
            $email->setFrom('bituinflowershop@gmail.com');
            $email->setSubject('Bituin Flower Shop');

            
            $email->setMailType('html');
            
            $message = view('admin/emails/booking_approve', [
                'fullname' => $fullname,
                'contact' => $contact,
                'user_email' => $user_email,
                'location' => $location,
                'date' => $date,
                'start' => $startFormatted,
                'balance' => $balance
            ]);
             $email->setMessage($message);   
                
                if($email->send()){
                    return redirect()->to('reservationlist')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            }
            else if($status == 'Finished'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

            
            $email->setMailType('html');
            
            $message = view('admin/emails/booking_finished', [
                'fullname' => $fullname,
                'contact' => $contact,
                'user_email' => $user_email,
                'location' => $location,
                'date' => $date,
                'start' => $startFormatted,
                 'balance' => $balance
            ]);
             $email->setMessage($message);
                if($email->send()){
                    return redirect()->to('reservationlist')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            
            }
            else if($status == 'Finished'){
                $email = \Config\Services::email();
                $email->setTo($user_email);
                $email->setFrom('bituinflowershop@gmail.com');
                $email->setSubject('Bituin Flower Shop');

            
            $email->setMailType('html');
            
            $message = view('admin/emails/booking_finished', [
                'fullname' => $fullname,
                'contact' => $contact,
                'user_email' => $user_email,
                'location' => $location,
                'date' => $date,
                'start' => $startFormatted,
                 'balance' => $balance
            ]);
             $email->setMessage($message);
                if($email->send()){
                    return redirect()->to('reservationlist')
                    ->with('status_icon', 'success')
                    ->with('status', 'Email sent successfully');
                }
            
            }
        return redirect()->to('reservationlist')
        ->with('status_icon', 'success')
        ->with('status', 'Updated successfully');  
    }

    public function deletereservation($id){
        $Booking_model = new Booking_model();
        $Booking_model->delete($id);
        return redirect()->to('reservationlist')
        ->with('status_icon', 'success')
        ->with('status', 'Reservation deleted successfully');
    }

    public function cancel_booking($id){
        $Booking_model = new Booking_model();
        $Booking_model->delete($id);
        return redirect()->to('my_booking')
        ->with('status_icon', 'success')
        ->with('status', 'Reservation cancelled successfully');
    }
    
    public function update_payment($id){
        $id = $this->request->getPost('id');
        $fullname = $this->request->getPost('fullname');
        $contact = $this->request->getPost('contact');
        $user_email = $this->request->getPost('email');
        $location = $this->request->getPost('location');
        $date = $this->request->getPost('date');
        $start = $this->request->getPost('start');
        $payment_amount = $this->request->getPost('payment_amount');
        $status = $this->request->getPost('status');
        $balance = $this->request->getPost('balance');
        $startFormatted = date("h:i A", strtotime($start));

        $Booking_model = new Booking_model();
        
        
        $validation = [
            'proof_payment' => [
              'label' => 'Image File',
              'rules' => 'uploaded[proof_payment]'
              . '|is_image[proof_payment]'
              . '|mime_in[proof_payment,image/jpg,image/jpeg,image/png]'
            ],
            'payment_amount' => 'required',
        ];
        $errors = [
            'payment_amount' => [
                'required' => 'This field is required.',
            ],
        ];
        if(!$this->validate($validation, $errors))
        {
            $data['validation'] = $this->validator;
        }else{
            $file = $this->request->getFile('proof_payment');
            if($file->isValid() && ! $file->hasMoved())
            {
                $ss_payment = $file->getRandomName();
                $file->move('public/booking_payment/', $ss_payment);
            }
            
            $data = [
                'id' => $id,
                'fullname' => $fullname,
                'contact' => $contact,
                'email' => $user_email,
                'location' => $location,
                'date' => $date,
                'start' => $startFormatted,
                'payment_amount' => $payment_amount,
                'balance' => $balance,
                'status' => $status,
                'proof_payment' => $ss_payment,
            ];
            $Booking_model->update($id, $data);
            return redirect()->to('my_booking')
                ->with('status_icon', 'success')
                ->with('status', 'Payment added successfully');  
        }
        return redirect()->to('my_booking');
    }


    public function reservation_exportreport()
    {
        $booking = new BookingModel();
        $fileName = 'reservation_report.xlsx';
        $spreadsheet = new Spreadsheet();

        $reservation = $booking->where('status', 'finished')->findAll();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Fullname');
        $sheet->setCellValue('C1', 'Contact');
        $sheet->setCellValue('D1', 'Email');
        $sheet->setCellValue('E1', 'Category');
        $sheet->setCellValue('F1', 'Location');
        $sheet->setCellValue('G1', 'Date');
        $sheet->setCellValue('H1', 'Time Start');
        $sheet->setCellValue('I1', 'Time End');
        $rows = 2;
        foreach ($reservation as $row)
        {
            $sheet->setCellValue('A' . $rows, $row['id']);
            $sheet->setCellValue('B' . $rows, $row['fullname']);
            $sheet->setCellValue('C' . $rows, $row['contact']);
            $sheet->setCellValue('D' . $rows, $row['email']);
            $sheet->setCellValue('E' . $rows, $row['category']);
            $sheet->setCellValue('F' . $rows, $row['location']);
            $sheet->setCellValue('G' . $rows, $row['date']);
            $sheet->setCellValue('H' . $rows, $row['start']);
            $sheet->setCellValue('I' . $rows, $row['end']);
            $rows++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length:' . filesize($fileName));
        flush();
        readfile($fileName);
        exit;
    }
    
   
    public function mail()
    {
        return view('admin/reservation/email');
    }

    public function send_email()
    {
        $data = [];
        if($this->request->getmethod()=='post')
        {
            $validate = [
                'email' => ['rules' => 'required|valid_email'],
                'subject' => ['rules' => 'required'],
                'message' => ['rules' => 'required']
            ];
            
            if(!$this->validate($validate)){
                 $data['validation'] = $this->validator;
            } else {

                if($this->isOnline()){
                    $to = $this->request->getVar('email');
                    $subject = $this->request->getVar('subject');
                    $message = $this->request->getVar('message');

                    $email = \Config\Services::email();
                    $view = \Config\Services::renderer();

                    $new_message = $view->setVar('message', $message)->render('/admin/reservation/email_msg');

                    $email->setTo($to);
                    $email->setFrom('bituinflowershop@gmail.com');
                    $email->setSubject($subject);
                    $email->setMessage($new_message);

                    if($email->send()){
                        return redirect()->to('reservationlist')
                        ->with('status_icon', 'success')
                        ->with('status', 'Email sent successfully');
                    } else {
                        return redirect()->to('mail')->with('error', 'Email sent failed')->withInput();
                    }
                } else {
                    return redirect()->to('mail')->with('error', 'Check your internet connection')->withInput();
                }
            }
        }
        return view('admin/reservation/email');
    }

    public function isOnline($site = "https://youtube.com")
    {
        if(@fopen($site, "r")){
            return true;
        } else {
            return false;
        }
    }

    public function event_calendar()
    {
        $Booking_model = new Booking_model();
        $data['booked_dates'] = $Booking_model->getBookedDates();

        return view('home/bookings/event_calendar', $data);
    }

    public function insertpayment()
    {
        $Payment_model = new Payment_model();
        $data = [];
    
        if ($this->request->getMethod() == 'post') {
            $data = array(
                'fk_id'          => $this->request->getVar('id'),
                'total_payment'  => $this->request->getVar('payment_amount'),
                'reference_id'   => $this->request->getVar('reference_id'),
                'status'         => $this->request->getVar('payment_status'),
                'email'          => $this->request->getVar('email'),
            );
    
            if ($Payment_model->save($data)) {
                return redirect()->to('my_booking')
                    ->with('success', 'Payment successful! Please wait while we process your payment, which will be automatically deducted from your remaining balance.');
            }
        }
    
        return view('home/bookings/my_booking', $data);
    }

    
    public function confirmPayment($id)
    {
        $fk_id = $this->request->getPost('fk_id');
        $payment_amount = $this->request->getPost('payment_amount');
        $user_email = $this->request->getPost('email');
        $reference_id = $this->request->getPost('reference_id');
        $booking_id = $this->request->getPost('booking_id');
    
        // Update the payment status in Payment_model
        $Payment_model = new Payment_model();
        $updatedData = [
            'status' => $this->request->getPost('status'),
        ];
        $Payment_model->update($id, $updatedData);
    
        // Update the payment_amount and calculate the balance in Booking_model
        $Booking_model = new Booking_model();
        $bookingRecord = $Booking_model->find($fk_id);
    
        $balance = 0; // Initialize balance to 0
    
        if ($bookingRecord) {
            $currentBalance = $bookingRecord['balance'];
            $currentPaymentAmount = $bookingRecord['payment_amount'];
            $updatedPaymentAmount = $currentPaymentAmount + $payment_amount;
    
            // Calculate the balance
            $balance = $currentBalance - $updatedPaymentAmount;
    
            $updatedBookingData = [
                'payment_amount' => $updatedPaymentAmount,
                // Update other fields in Booking_model if needed
            ];
            $Booking_model->update($fk_id, $updatedBookingData);
        }
    
        $email = \Config\Services::email();
        $email->setTo($user_email);
        $email->setFrom('bituinflowershop@gmail.com');
        $email->setSubject('Bituin Flower Shop');
        $email->setMailType('html');
    
        $message = view('admin/emails/payment_notif', [
            'payment_amount' => $payment_amount,
            'reference_id' => $reference_id,
            'booking_id' => $booking_id,
            'balance' => $balance,
            'currentBalance' => $currentBalance,
            'fk_id' => $fk_id
            
        ]);
    
        $email->setMessage($message);
    
        if ($email->send()) {
            return redirect()->to('payment_list')
                ->with('status_icon', 'success')
                ->with('status', 'Updated successfully');
        }
    }

}

