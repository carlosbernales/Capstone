<?php

namespace App\Models;
use CodeIgniter\Model;

class Product_model extends Model
{
    protected $table = 'product';
    protected $allowedFields = [
        'id',
        'cat_name',
        'product_name',
        'category_id',
        'product_des',
        'product_qty',
        'product_price',
        'availability',
        'product_image',
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
    public function updateProductCategory($categoryId, $newCatName)
    {
        $this->transBegin();

        $categoryModel = new Category_model();
        $categoryModel->update($categoryId, ['cat_name' => $newCatName]);

        $this->where('category_id', $categoryId)->set(['cat_name' => $newCatName])->update();

        if ($this->transStatus() === false) {
            $this->transRollback();
            return false;
        } else {
            $this->transCommit();
            return true;
        }
    }
    
}

?>