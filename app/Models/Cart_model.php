<?php

namespace App\Models;
use CodeIgniter\Model;

class Cart_model extends Model
{
    protected $table = 'cart';
    protected $allowedFields = [
        'id',
        'fk_user_id',
        'fk_product_id', 
        'cart_qty',
        'cart_cost',
        'created_at',
        'updated_at'
    ];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
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