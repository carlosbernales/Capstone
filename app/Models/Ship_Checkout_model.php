<?php

namespace App\Models;
use CodeIgniter\Model;

class Ship_Checkout_model extends Model
{
    protected $table = 'shipinfo_checkout';
    protected $allowedFields = [
        'id',
        'firstname',
        'lastname',
        'contact',
        'selected_city',
        'selected_barangay',
        'barangay_id',
        'shipping_fee',
        'city_id',
        'other_infoaddres',
        'fk_user_id',
    ];
    protected $primaryKey = 'id';

    

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['created_at'] = date('Y-m-d H:i:s');

        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['updated_at'] = date('Y-m-d H:i:s');

        return $data;
    }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password']))
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }
}

?>