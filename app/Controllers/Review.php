<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\Review_model;
use App\Models\Product_model;
use App\Models\Order_model;

class Review extends BaseController
{

    public function view($id)
    {
    $Product_model = new Product_model();
    $Review_model = new Review_model();

    // Get the product by ID
    $product = $Product_model->find($id);

    if (!$Product_model) {
        // Handle the case where the product is not found
        return redirect()->back()->with('error', 'Product not found.');
    }

    // Get the reviews for the product
    $reviews = $Review_model->where('product_id', $id)->findAll();

    return view('productdetail', [
        'product' => $product,
        'reviews' => $reviews
    ]);
    }

    public function update_reviews($id){

        $Review_model = new Review_model();
        $review = $Review_model->find($id);
        $data = [
            'status' => $this->request->getVar('status'),
        ];
        $Review_model->update($id, $data);
        return redirect()->to('reviews')
                ->with('status_icon', 'success')
                ->with('status', 'Reviews accepted');
    }

    public function delete_reviews($id){
        $Review_model = new Review_model();
        $Review_model->where($id)->delete();
        return redirect()->to('reviews')
            ->with('status_icon', 'success')
            ->with('status', 'Reviews declined');
    }

    public function submitReview()
    {
        $Review_model = new Review_model();
        $Order_model = new Order_model();

        $fk_order_ids = $this->request->getPost('fk_order_id');
        $product_ids = $this->request->getPost('product_id');
        $names = $this->request->getPost('name');
        $reviews = $this->request->getPost('review');
        $ratings = $this->request->getPost('rating');
        $ids = $this->request->getPost('id');
        $variation = $this->request->getPost('variation');
        $status = $this->request->getPost('status');

        $reviewData = [];
        foreach ($fk_order_ids as $index => $fk_order_id) {
            $reviewData[] = [
                'fk_order_id' => $fk_order_id,
                'product_id' => $product_ids[$index],
                'name' => $names[$index],
                'review' => $reviews[$index],
                'variation' => $variation[$index],
                'rating' => $ratings[$ids[$index]],
                'status' => $status[$index]
            ];
        }
        $Review_model->insertBatch($reviewData);

        foreach ($fk_order_ids as $fk_order_id) {
            $Order_model->where('id', $fk_order_id)->set(['order_status' => 'Received'])->update();
        }

        return redirect()->to('orders'); 
    }

    public function sendresponse($id)
    {
        $reponse = $this->request->getPost('response');
        $status = $this->request->getPost('status');


        $Review_model = new Review_model();
        
        $data = [
            'response' => $reponse,
            'status' => $status
        ];

        $Review_model->update($id, $data);
        return redirect()->to('reviews')
                            ->with('status_icon', 'success')
                            ->with('status', 'Response Sent');
        
    }

    public function dismiss_review($id){

        $Review_model = new Review_model();
        $review = $Review_model->find($id);
        $data = [
            'status' => $this->request->getVar('status'),
        ];
        $Review_model->update($id, $data);
        return redirect()->to('reviews')
                ->with('status_icon', 'success')
                ->with('status', 'Review Dismissed');
    }

}

