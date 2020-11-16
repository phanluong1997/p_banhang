<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class FrontendController extends Controller
{
    //
    public function getIndex(){
        $product = Product::paginate(6);
        // dd($product);die;
        return view('frontend.index',['product'=>$product]);
    }
}
