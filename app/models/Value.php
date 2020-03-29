<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $table='values';
    protected $fillable = ['value', 'attribute_id'];
    public $timestamps = false;
    public function attribute()
   {
       return $this->belongsTo('App\models\Attribute', 'attribute_id', 'id');
   }
   public function product()
   {
       return $this->belongsToMany('App\models\Product', 'values_product', 'value_id', 'product_id');
   }
}
