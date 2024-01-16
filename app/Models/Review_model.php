<?php

namespace App\Models;

use CodeIgniter\Model;

class Review_model extends Model
{
    protected $table = 'reviews'; // Assuming you have a table named 'reviews'
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'product_id', 
        'name',
        'fk_order_id',
        'rating',
        'review',
        'variation',
        'response',
        'status',
        ];


}
