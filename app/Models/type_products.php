<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_products extends Model
{
    use HasFactory;
    protected $table = 'type_products';
    public function products(){
        return $this -> hasMany('app\products');

    }
    public function comment(){
        return $this -> hasMany('app\#abc');
    }
}
