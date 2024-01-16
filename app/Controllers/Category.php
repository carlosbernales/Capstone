<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category_model;
use App\Models\Product_model;


class Category extends BaseController
{
    public function addcategory()
    {
        $Category_model = new Category_model();
        $data = [];
        if($this->request->getmethod()=='post')
        {
            $data = array(
                'cat_name' => $this->request->getVar('category_name'),
            );
            if($Category_model->save($data))
                {
                    return redirect()->to('categorylist')
            ->with('status_icon', 'success')    
            ->with('status', 'Category added successfully');
                }
        }
        return view('admin/category/categorylist', $data);
    }

    public function editcategory($id)
    {
        $Category_model = new Category_model();
        $data['category'] = $Category_model->find($id);
        return view('admin/category/categorylist', $data);
    }

    public function updateCategory($id)
    {
        $newCatName = $this->request->getPost('category_name');

        $productModel = new Product_model();
        $success = $productModel->updateProductCategory($id, $newCatName);

        if ($success) {
            return redirect()->to('categorylist')
                ->with('status_icon', 'success')
                ->with('status', 'Category updated successfully');
        } else {
            return redirect()->to('categorylist')
                ->with('status_icon', 'error')
                ->with('status', 'Failed to update category');
        }
    }

    public function deleteCategory($id)
    {
        $Product_model = new Product_model();
        $Category_model = new Category_model();

        $Category_model->delete($id);

        $Product_model->where('category_id', $id)->delete();

        return redirect()->to('categorylist')
            ->with('status_icon', 'success')
            ->with('status', 'Category Deleted');
    }
   
}
