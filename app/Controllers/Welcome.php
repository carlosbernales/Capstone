<?php

namespace App\Controllers;
use App\Models\Category_model;
use App\Models\Product_model;

class Welcome extends BaseController
{
   

    public function draganddrop()
    {
        $Category_model = new Category_model();
        $Product_model = new Product_model();
        $data['category'] = $Category_model->findAll();
        $data['listProducts'] = $Product_model->where('cat_name', 'Flowers Bouquet')->findAll();
        return view('test', $data);
    }
}
