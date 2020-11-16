<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'l_cate';
    protected $primaryKey = 'id';
    protected $guarded = [];//k cos truowngf duwx lieu dc bao ve
    
    public function product(){
        return $this->hasMany(Product::class,'category','id');
    }
}
