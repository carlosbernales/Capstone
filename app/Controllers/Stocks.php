<?php

namespace App\Controllers;
use App\Models\Category_model;
use App\Models\Product_model;
use App\Models\Stocks_model;
use App\Models\Stocks_Category_model;

class Stocks extends BaseController
{

    public function add_stocks_category(){
        $data = [];
        $Stocks_Category_model = new Stocks_Category_model();
        if($this->request->getmethod()=='post')
        {
            $data = array(
                'category_name' => $this->request->getVar('category_name'),
            );
            if($Stocks_Category_model->save($data)){
                return redirect()->to('stocks_category')
                ->with('status_icon', 'success')    
                ->with('status', 'Category added successfully');
            }
        }
        return view('admin/stocks_category/stocks_category_list', $data);
    }

    public function edit_stocks_category($id)
    {
        $Stocks_Category_model = new Stocks_Category_model();
        $data['category'] = $Stocks_Category_model->find($id);
        return view('admin/stocks_category/stocks_category_list', $data);
    }

    public function category_stocks_update_($id)
    {
        $newCatName = $this->request->getPost('category_name');

        $Stocks_model = new Stocks_model();
        $success = $Stocks_model->updateStocksCategory($id, $newCatName);

        if ($success) {
            return redirect()->to('stocks_category')
                ->with('status_icon', 'success')
                ->with('status', 'Category updated successfully');
        } else {
            return redirect()->to('stocks_category')
                ->with('status_icon', 'error')
                ->with('status', 'Failed to update category');
        }
    }

    public function delete_stocks_category($id)
    {
        $Stocks_model = new Stocks_model();
        $Stocks_Category_model = new Stocks_Category_model();

        $Stocks_Category_model->delete($id);

        $Stocks_model->where('stock_category_id', $id)->delete();

        return redirect()->to('stocks_category')
            ->with('status_icon', 'success')
            ->with('status', 'Category Deleted');
    }


    public function addproduct_stocks()
    {
        $data = [];
        $Stocks_model = new Stocks_model();
        $Stocks_Category_model = new Stocks_Category_model();
        if($this->request->getmethod()=='post')
        {
            $validation = [
                'image' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[image]'
                    . '|is_image[image]'
                    . '|mime_in[image,image/jpg,image/jpeg,image/png]'
                ]
            ];
            if(!$this->validate($validation))
            {
                $data['validation'] = $this->validator;
            }else{
                $file = $this->request->getFile('image');

                if($file->isValid() && ! $file->hasMoved())
                {
                    $imageName = $file->getRandomName();
                    $file->move('public/stocks/', $imageName);
                }
                $data = array(
                    'stock_category_id' => $this->request->getVar('stock_category_id'),
                    'category_name' => $this->request->getVar('category_name'),
                    'product_name' => $this->request->getVar('product_name'),
                    'color' => $this->request->getVar('color'),
                    'stock_qty' => $this->request->getVar('stock_qty'),
                    'fix_stock_qty' => $this->request->getVar('fix_stock_qty'),
                    'stock_price' => $this->request->getVar('stock_price'),
                    'bundle_price' => $this->request->getVar('bundle_price'),
                    'investment' => $this->request->getVar('investment'),
                    'image' => $imageName
                );
                if ($Stocks_model->save($data)) {
                    return redirect()->to('stocks')
                    ->with('status_icon', 'success')
                    ->with('status', 'Product stocks added successfully');
                }
            }
        }
        return view('admin/stocks/addproducts', $data);
    }

    public function add_stocks($id){
        $Stocks_model = new Stocks_model();
        $data['stocks'] = $Stocks_model->find($id);
        return view('admin/stocks/addstocks', $data);
    }

    public function edit($id = null)
    {
        
        $Stocks_model = new Stocks_model();
      
     $data = $model->where('id', $id)->first();
       
    if($data){
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false));
        }
    }

    
    public function update_add_stocks($id)
    {
        $id = $this->request->getPost('id');
        $stock_category_id = $this->request->getPost('stock_category_id');
        $category_name = $this->request->getPost('category_name');
        $product_name = $this->request->getPost('product_name');
        $stock_qty = $this->request->getPost('stock_qty');
        $fix_stock_qty = $this->request->getPost('fix_stock_qty');
        // $stock_price = $this->request->getPost('stock_price');
        $goods = $this->request->getPost('goods');
        $reject = $this->request->getPost('reject');
        $rejectprice = $this->request->getPost('rejectprice');
        $goodprice = $this->request->getPost('goodprice');
        $investment = $this->request->getPost('investment');

        $Stocks_model = new Stocks_model();
        $data = [
            'stock_category_id' => $stock_category_id,
            'category_name' => $category_name,
            'product_name' => $product_name,
            'stock_qty' => $stock_qty,
            'fix_stock_qty' => $fix_stock_qty,
            // 'stock_price' => $stock_price,
            'goods' => $goods,
            'reject' => $reject,
            'rejectprice' => $rejectprice,
            'goodprice' => $goodprice,
            'investment' => $investment,
        ];
        
        $Stocks_model->update($id, $data);
        return redirect()->to('stocks')
            ->with('status_icon', 'success')
            ->with('status', 'Stocks added successfully');
    }

    
    public function minus_stocks($id){
        $Stocks_model = new Stocks_model();
        $data = [
            'stocks' => $Stocks_model->find($id)
        ];
        return view('admin/stocks/stockslist', $data);
    }

    
    public function update_minus_stocks($id)
    {
        $id = $this->request->getPost('id');
        $stock_category_id = $this->request->getPost('stock_category_id');
        $product_name = $this->request->getPost('product_name');
        $stock_qty = $this->request->getPost('stock_qty');
        $fix_stock_qty = $this->request->getPost('fix_stock_qty');
        $stock_price = $this->request->getPost('stock_price');
        $goods = $this->request->getPost('goods');
        $reject = $this->request->getPost('reject');
        $rejectprice = $this->request->getPost('rejectprice');
        $goodprice = $this->request->getPost('goodprice');

        $Stocks_model = new Stocks_model();
        $data = [
            'stock_category_id' => $stock_category_id,
            'product_name' => $product_name,
            'stock_qty' => $stock_qty,
            'fix_stock_qty' => $fix_stock_qty,
            'stock_price' => $stock_price,
            'goods' => $goods,
            'reject' => $reject,
            'rejectprice' => $rejectprice,
            'goodprice' => $goodprice,
        ];
        
        $Stocks_model->update($id, $data);
        return redirect()->to('stocks')
            ->with('status_icon', 'success')
            ->with('status', 'Stocks reduced successfully');
    }

    public function reject_stocks($id){
        
        $Stocks_model = new Stocks_model();
        $data = [
            'stocks' => $Stocks_model->find($id)
        ];
        return view('admin/stocks/rejectstocks', $data);
    }

    
    public function update_reject_stocks($id)
    {
        $id = $this->request->getPost('id');
        $stock_category_id = $this->request->getPost('stock_category_id');
        $product_name = $this->request->getPost('product_name');
        $stock_qty = $this->request->getPost('stock_qty');
        $fix_stock_qty = $this->request->getPost('fix_stock_qty');
        $stock_price = $this->request->getPost('stock_price');
        $goods = $this->request->getPost('goods');
        $reject = $this->request->getPost('reject');
        $rejectprice = $this->request->getPost('rejectprice');
        $goodprice = $this->request->getPost('goodprice');

        $Stocks_model = new Stocks_model();
        $data = [
            'stock_category_id' => $stock_category_id,
            'product_name' => $product_name,
            'stock_qty' => $stock_qty,
            'fix_stock_qty' => $fix_stock_qty,
            'stock_price' => $stock_price,
            'goods' => $goods,
            'reject' => $reject,
            'rejectprice' => $rejectprice,
            'goodprice' => $goodprice,
        ];
        
        $Stocks_model->update($id, $data);
        return redirect()->to('stocks')
            ->with('status_icon', 'success')
            ->with('status', 'Stocks rejected successfully');
    }

    public function delete_stocks($id)
    {
        $Stocks_model = new Stocks_model();

        $Stocks_model->delete($id);

        return redirect()->to('stocks')
            ->with('status_icon', 'success')
            ->with('status', 'Stocks Deleted');
    }
    public function edit_stocks($id)
    {
        $Stocks_model = new Stocks_model();

        $stocks_image = $Stocks_model->find($id);
        $old_img_name = $stocks_image['image'];
        $file = $this->request->getFile('image');
        if($file->isValid() && !$file->hasMoved())
        {
            if(file_exists('public/stocks/'. $old_img_name)){
                $imageName = $file->getRandomName();
            $file->move('public/stocks/', $imageName);
            }
           
        }
        else{
            $imageName = $old_img_name;
        }
        $data = [
            'fix_stock_qty' => $this->request->getPost('fix_stock_qty'),
            'bundle_price' => $this->request->getPost('bundle_price'),
            'product_name' => $this->request->getPost('product_name'),
            'color' => $this->request->getPost('color'),
            'image' => $imageName,
            'stock_price' => $this->request->getPost('stock_price'),
        ];

        $Stocks_model->update($id, $data);

        return redirect()->to('stocks')
        ->with('status_icon', 'success')
        ->with('status', 'Product updated successfully');
    }


}
