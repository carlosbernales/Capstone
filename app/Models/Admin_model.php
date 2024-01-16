<?php

namespace App\Models;
use CodeIgniter\Model;

class Admin_model extends Model
{
    protected $table = 'admin';
    protected $allowedFields = [
        'id',
        'username',
        'password',
        'email',
        'phone',
        'address',
        'created_at',
        'updated_at'
    ];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    protected $primaryKey = 'id';

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    // Add a function to check if a user has a certain role
    public function hasRole($userId, $role)
    {
        $user = $this->find($userId);

        return ($user['role'] === $role);
    }

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