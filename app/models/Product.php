<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public function category()
    {
        return $this->belongsTo('App\models\Category', 'category_id', 'id');
    }
}
