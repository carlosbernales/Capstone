<?php

namespace App\Models;
use CodeIgniter\Model;

class Customize_model extends Model
{
    protected $table = 'customize';
    protected $allowedFields = [
        'id',
        'order_id',
        'fk_user_id',
        'image',
        'details',
        'name',
        'email',
        'order_amount',
        'order_type',
        'phone',
        'order_status',
        'order_date'
    ];
    protected $beforeInsert = ['beforeInsert'];
    protected $primaryKey = 'id';

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['order_date'] = date('Y-m-d H:i:s');

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