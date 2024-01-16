<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cart_model;
use App\Models\Product_model;
use App\Models\Category_model;

class Cart extends BaseController
{

    public function draganddrop()
    {
        echo CI_VERSION;
        $Product_model = new Product_model();
        $data['listProducts'] = $Product_model->findAll();
        return view('test', $data);
    }
    
    public function isExist($id){
        $cart = \Config\Services::cart();
        foreach( $this->$cart->contents () as $i)
            if ($i ['id'] == $id)
                return $i ['rowid'];
        return - 1;
    }

    public function getQuantity($id){
        $cart = \Config\Services::cart();
        $s = 0;
        foreach ($this->$cart->contents () as $i)
            if ($i ['id'] == $id)
                $s += $i ['product_qty'];
            return $s;
    }

    public function buy(){
        $Product_model = new Product_model();
        $cart = \Config\Services::cart();
        $id = $this->request->getVar('id');
        $index = $this->isExist($id);
        if($index == - 1){
            $product = $this->Product_model->find($id);
            $data = array(
                'id' => $id,
                'product_name' => $this->request->getVar('product_name'),
                'product_price' => $this->request->getVar('product_price'),
                'product_qty' => 1,
                'options' => array(
                    'product_image' => $this->request->getVar('product_image'),
                )
            );
            $this->$cart->insert($data);
        }else{
            $data = array(
                'rowid' => $index,
                'product_qty' => $this->getQuantity($id) + 1
            );
            $this->$cart->update($data);
        }
        $result['result'] = $this->displayCart();
        echo json_encode($result);
    }

    public function displayCart(){
        $result = array();
        $cart = \Config\Services::cart();
        foreach($this->$cart->contents() as $items){
            $product = array(
                'id' => $items['id'],
                'product_name' => $items['product_name'],
                'product_qty' => $items['product_qty'],
                'product_price' => $items['product_price'],
                'product_image' => $items['options']['product_image']
            );
            array_push($result, $product);
        }
        return $result;
    }

    public function delete(){
        $cart = \Config\Services::cart();
        $id = $this->request->getVar('id');
        $index = $this->isExist ($id);
        $data = array(
            'rowid' => $index,
            'product_qty' => 0
        );
        $this->$cart->update($data);
        $result['result'] = $this->displayCart();
        echo json_encode($result);
    }
}