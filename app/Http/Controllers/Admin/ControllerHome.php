<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Auth;
class ControllerHome extends Controller
{
    public function getHome(){
        $data = Product::all()->count();
        $cate = Category::all()->count();
        // dd($data);die;
        return view('backend.index',['data'=>$data,'cate'=>$cate]);
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->intended('login');
    }
}
