<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table='attributes';
    protected $fillable = ['name'];
    public $timestamps = false;
    public function values()
    {
        return $this->hasMany('App\models\Value', 'attribute_id', 'id');
    }
}
