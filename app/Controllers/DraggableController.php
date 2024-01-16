<?php

namespace App\Controllers;

use App\Models\Stocks_Category_model;
use App\Models\Stocks_model;
use CodeIgniter\Controller;

class DraggableController extends Controller
{
    public function index()
    {
        $Stocks_Category_model = new Stocks_Category_model();
        $Stocks_model = new Stocks_model();

        $categories = $Stocks_Category_model->findAll();
        $products = $Stocks_model->findAll();

        $data = [
            'categories' => $categories,
            'products' => $products
        ];

        return view('test', $data);
    }
}
