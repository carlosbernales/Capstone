<?php

namespace App\Models;
use CodeIgniter\Model;

class Order_model extends Model
{
    protected $table = 'orderdata';
    protected $allowedFields = [
        'id',
        'order_id',
        'fk_user_id',
        'order_amount',
        'labor',
        'user_email',
        'order_date',
        'order_type',
        'flower_sizeOrtype',
        'proof_payment',
        'shipping_fee',
        'firstname',
        'lastname',
        'contact',
        'selected_city',
        'selected_barangay',
        'other_infoaddres',
        'order_status'
    ];
    protected $primaryKey = 'id';

    public function getCompletedOrderAmountSum()
    {
        $query = $this->selectSum('order_amount')
            ->whereIn('order_status', ['Completed', 'Received'])
            ->get();

        $result = $query->getRow();
        $sum = $result->order_amount;

        return $sum;
    }

    public function sumoforderthismonth()
    {
        $currentDate = date('Y-m-d');
        $firstDayOfMonth = date('Y-m-01', strtotime($currentDate));

        $query = $this->selectSum('order_amount')
            ->whereIn('order_status', ['Completed', 'Received'])
            ->where('order_date >=', $firstDayOfMonth)
            ->get();

        $result = $query->getRow();
        $sumThisMonth = $result->order_amount;

        return $sumThisMonth;
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