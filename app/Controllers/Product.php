<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category_model;
use App\Models\Product_model;
use App\Models\Customization;


class Product extends BaseController
{
    public function addproduct()
    {
        $Product_model = new Product_model();
        $Category_model = new Category_model();
        $data = [];
        helper(['form']);
        if($this->request->getmethod()=='post')
        {
            $validation = [
              'product_image' => [
                'label' => 'Image File',
                'rules' => 'uploaded[product_image]'
                . '|is_image[product_image]'
                . '|mime_in[product_image,image/jpg,image/jpeg,image/png]'
              ]
            ];
            if(!$this->validate($validation))
            {
                $data['validation'] = $this->validator;
            }else{
                $file = $this->request->getFile('product_image');

                if($file->isValid() && ! $file->hasMoved())
                {
                    $imageName = $file->getRandomName();
                    $file->move('public/products/', $imageName);
                }
                $product_code = 'BFS'. ' ' . rand(1000, 10);
                $data = array(
                    'product_name' => $product_code,
                    'category_id' => $this->request->getVar('category_id'),
                    'product_des' => $this->request->getVar('product_des'),
                    'cat_name' =>  $this->request->getVar('category_name'),
                    'product_qty' => $this->request->getVar('product_qty'),
                    'availability' => $this->request->getVar('availability'),
                    'product_price' => $this->request->getVar('product_price'),
                    'product_image' => $imageName
                );
                if ($Product_model->save($data)) {
                    return redirect()->to('productlist')
                    ->with('status_icon', 'success')
                    ->with('status', 'Product addedd successfully');
                }
            }
        }
        $data['category'] = $Category_model->findAll();
        return view('admin/product/productlist', $data);
    }

    public function editproduct($id)
    {
        $Category_model = new Category_model();
        $Product_model = new Product_model();
        $data['category'] = $Category_model->findAll();
        $data['product'] = $Product_model->find($id);
        return view('admin/product/productlist', $data);
    }

    public function deleteproduct($id)
    {
        $Product_model = new Product_model();
        $Product_model->delete($id);
        return redirect()->to('productlist')
        ->with('status_icon', 'success')
        ->with('status', 'Product deleted successfully');
    }

    
    public function updateproduct($id)
    {

        $Category_model = new Category_model();
        $Product_model = new Product_model();

        $id = $this->request->getPost('id');
        $cat_name = $this->request->getPost('category_names');
        $cat_id = $this->request->getPost('cat_id');
        $product_price = $this->request->getPost('product_price');
        $availability = $this->request->getPost('availability');
        $product_des = $this->request->getPost('product_des');
        $availability = $this->request->getPost('availability');

        
        $product_item = $Product_model->find($id);
        $old_img_name = $product_item['product_image'];
        $file = $this->request->getFile('product_image');
        if($file->isValid() && !$file->hasMoved())
        {
            if(file_exists("public/products/". $old_img_name)){
                unlink("public/products/". $old_img_name);
            }
            $imageName = $file->getRandomName();
            $file->move('public/products/', $imageName);
        }
        else{
            $imageName = $old_img_name;
        }
        $data = [
            'cat_name' => $cat_name,
            'category_id' => $cat_id,
            'product_price' => $product_price,
            'availability' => $availability,
            'product_des' => $product_des,
            'product_image' => $imageName,
        ];

        $Product_model->update($id, $data);
        return redirect()->to('productlist')
                            ->with('status_icon', 'success')
                            ->with('status', 'Product updated successfully');
        
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'phone' => $user['phone'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }
    
    public function draganddrop()
    {
        $Category_model = new Category_model();
        $product = new Product_model();
        $data['category'] = $Category_model->findAll();
        $data['product'] = $product->where('cat_name', 'Flowers Bouquet')->findAll();
        $data['main_content'] = 'home/customization';
        return view('includes/template', $data);
    }

}
