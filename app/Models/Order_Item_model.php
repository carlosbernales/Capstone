<?php

namespace App\Models;
use CodeIgniter\Model;

class Order_Item_model extends Model
{
    protected $table = 'order_item';
    protected $allowedFields = [
        'id',
        'fk_order_id',
        'product_id',
        'item_image',
        'item_name',
        'item_color',
        'item_amount',
        'item_qty',
        'details',
        'order_date'
    ];
    protected $primaryKey = 'id';
    
    public function insertDroppedProducts($droppedProducts) {
        foreach ($droppedProducts as $productId => $productData) {
            // Insert into the database
            $data = array(
                'product_id' => $productId,
                'item_name' => $productData['item_name'],
                'item_qty' => $productData['item_qty'],
                'item_color' => $productData['item_color'],
                // Add other fields as needed
            );

            $this->insert($data);
        }

        // ... other logic ...

        return true; // or any relevant response
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

    public function get_order_id($id)
    {
        $builder = $this->db->table('order_item');
        $builder->select('orderdata.id as orderdata_id')
                ->join('order_item', 'order_item.fk_order_id = orderdata.id')
                ->where('order_item.fk_order_id', $id);
       
        $results = $builder->get()->getRow();

        if($results){
            return $results->orderdata_id;
        }else{
            return null;
        }
    }

}

?>