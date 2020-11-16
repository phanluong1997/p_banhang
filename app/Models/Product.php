<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Product extends Model
{
    //
    protected $table = 'l_products';
    protected $primaryKey = 'id';
    protected $guarded = [];//k cos truowngf duwx lieu dc bao ve
    public function cate(){
        return $this->belongsTo(Category::class,'category','id');
    }

    
}
