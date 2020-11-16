<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class ControllerCategory extends Controller
{
    public function getCate(){
        $data= Category::all();
        return view('backend.category',['data'=>$data]);
    }
    public function postCate(AddCateRequest $request){
        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();
        return back();
    }
    public function getEditCate($id){
        $data = Category::find($id);
        return view('backend.editcategory',['data' => $data]);
    }
    public function postEditCate(EditCateRequest $request,$id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();
        return redirect()->intended('admin/category');
    }
    public function getDeleteCate($id){
        Category::destroy($id);
        return back();
    }

}
