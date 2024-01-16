<?php

namespace App\Models;
use CodeIgniter\Model;

class Account_model extends Model
{
    protected $table = 'user';
    protected $allowedFields = [
        'id',
        'firstname',
        'lastname',
        'email',
        'phone',
        'gcash_no',
        'gcash_qr',
        'signature_image',
        'address',
        'password',
        'created_at',
        'token',
        'tokens',
        'otp',
        'otp_timestamp',
        'status',
        'role'
    ];
    protected $beforeInsert = ['beforeInsert'];
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