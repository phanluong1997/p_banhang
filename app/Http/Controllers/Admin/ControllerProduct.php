<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\AddProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

class ControllerProduct extends Controller
{

    public function getPro(){
        $data = Product::paginate(10);
        // dd($data); die();
        return view('backend.product',['data'=> $data]);

    }
    public function getAddPro(){
        $data = Category::all();
        return view('backend.addproduct',['data'=>$data]);
    }
    public function postAddPro(AddProductRequest $request){
        if($request->hasFile('image')){
            //upload img
            $image  =$request->file('image');
            //upload
            $image_name = $image->getClientOriginalExtension();
            $image_name = time().'.'.$image_name;

            $thumb =  $image->getClientOriginalExtension();
            $thumb = time().'_thumb.'.$thumb;
            // dd($thumb);die;
            Image::make($image)->fit(400,200)
            ->save(public_path('/upload/product/thumb/' .$thumb));

            $image->move(public_path('/upload/product/'),$image_name);
        }
        $product = new Product();
        $product->name = $request->name;
        $product->img   =  $image_name;
        $product->thumb =   $thumb;
        $product->category = $request->cate;
        $product->save();

        return redirect()->intended('admin/product');
    }
    public function getEditPro($id){
        $product = Product::find($id);
        $data = Category::all();
        // dd($product);die;
        return view('backend.editproduct',['product'=>$product, 'data'=>$data]);
    }
    public function postEditPro(Request $request ,$id){
        $this->validate($request,[
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ],
            [
                'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            ]);
        $product = Product::find($id);

        if($request->hasFile('image')){
            $file_image = 'upload/product/'.$product['img'];
            $file_thumb = 'upload/product/thumb/'.$product['thumb'];
            if($product['img']!= ''){unlink($file_image);}
            if($product['thumb']!= ''){unlink($file_thumb);}
           
            //upload img
            $image  =$request->file('image');
            //upload
            $image_name = $image->getClientOriginalExtension();
            $image_name = time().'.'.$image_name;

            $thumb =  $image->getClientOriginalExtension();
            $thumb = time().'_thumb.'.$thumb;
            
            Image::make($image)->fit(650,350)
            ->save(public_path('/upload/product/thumb/'.$thumb));

            $image->move(public_path('/upload/product/'),$image_name);
        }     
        // dd($request->image_name);die;
        // dd($product); die;
        $product->name = $request->name;
        $product->img   =  $image_name;
        
        $product->thumb =   $thumb;
        $product->category = $request->cate;
        $product->save();

        return redirect()->intended('admin/product');
    }
    public function getDeletePro($id){
        Product::destroy($id);
        return back();
    }



}
