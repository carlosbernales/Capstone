<?php

namespace App\Models;
use CodeIgniter\Model;

class City_model extends Model
{
    protected $table = 'cities';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'city_name'
    ];
    public function barangays()
    {
        return $this->hasMany('App\Models\Barangay_model', 'city_id', 'id');
    }
    
}

?>