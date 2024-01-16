<?php

namespace App\Models;
use CodeIgniter\Model;

class Stocks_model extends Model
{
    protected $table = 'stocks';
    protected $allowedFields = [
        'id',
        'stock_category_id',
        'category_name',
        'product_name',
        'color',
        'image',
        'stock_qty',
        'fix_stock_qty',
        'stock_price',
        'bundle_price',
        'revenue',
        'investment',
        'goods',
        'reject',
        // 'rejectprice',
        // 'goodprice',
        'created_at'
    ];
    protected $beforeInsert = ['beforeInsert'];
    protected $primaryKey = 'id';

    public function getInvestmentSum()
    {
        $query = $this->selectSum('investment')
            ->get();

        $result = $query->getRow();
        $sums = $result->investment;

        return $sums;
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
    public function updateStocksCategory($categoryId, $newCatName)
    {
        $this->transBegin();

        $Stocks_Category_model = new Stocks_Category_model();
        $Stocks_Category_model->update($categoryId, ['category_name' => $newCatName]);

        $this->where('stock_category_id', $categoryId)->set(['category_name' => $newCatName])->update();

        if ($this->transStatus() === false) {
            $this->transRollback();
            return false;
        } else {
            $this->transCommit();
            return true;
        }
    }

    public function getAllImages()
    {
        return $this->findAll();
    }

    public function getProductsByCategory($categoryId)
    {
        return $this->where('stock_category_id', $categoryId)->findAll();
    }
}

?>