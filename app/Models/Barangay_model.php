<?php

namespace App\Models;
use CodeIgniter\Model;

class Barangay_model extends Model
{
    protected $table = 'barangays';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'city_id',
        'brgy_name',
        'name_city',
        'shipping_fee'
    ];

    public function updateShippingFee($cityId, $barangayId, $shippingFee)
    {
        $this->db->transStart();

        // Update shipping_fee in shipping_info table
        $query1 = "UPDATE shipping_info SET shipping_fee = ? WHERE city_id = ? AND barangay_id = ?";
        $this->db->query($query1, [$shippingFee, $cityId, $barangayId]);

        // Update shipping_fee in barangays table
        $query2 = "UPDATE barangays SET shipping_fee = ? WHERE city_id = ? AND id = ?";
        $this->db->query($query2, [$shippingFee, $cityId, $barangayId]);

        // Update shipping_fee in shipinfo_checkout table
        $query3 = "UPDATE shipinfo_checkout SET shipping_fee = ? WHERE city_id = ? AND barangay_id = ?";
        $this->db->query($query3, [$shippingFee, $cityId, $barangayId]);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {

            return false;
        } else {
            return true;
        }
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City_model', 'city_id', 'id');
    }
    
}

?>