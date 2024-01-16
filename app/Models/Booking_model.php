<?php

namespace App\Models;

use CodeIgniter\Model;

class Booking_model extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'fk_userid',
        'fullname',
        'contact',
        'email',
        'location',
        'date',
        'start',
        'status',
        'balance',
        'payment_amount',
        'proof_payment'
    ];


    public function getBookedDates()
    {
        return $this->where('status', 'Approved') 
                    ->findAll(); 
    }


}