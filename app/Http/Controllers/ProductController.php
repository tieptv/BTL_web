<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Catagory;
use App\Manufacture;

class ProductController extends Controller
{
    public function getList(){
    	$product = Product::orderBy('id','DESC')->get();
    	return view('admin.product.list',['product'=>$product]);
    }
    public function getAdd(){
        $cate = Catagory::all();
        $manu = Manufacture::all();
    	return view('admin.product.add',['category'=>$cate,'manufacture'=>$manu]);

    }
    public function postAdd(Request $request){
    	$this->validate($request,['name'=>'required|min:3|max:100|unique:manafacture,name',
            'category'=>'required','description'=>'required','price'=>'required','image'=>'required'],
    		['name.required'=>'Bạn chưa nhập tên nhà sản xuất',
    		'name.min'=>'Tên nhà sản xuất phải có độ dài từ 3 đến 100 ký tự',
    		'name.max'=>'Tên nhà sản xuất phải có độ dài từ 3 đến 100 ký tự',
    		'name.unique'=>'Tên nhà sản xuất đã tồn tại',
            'category.required'=>'Bạn chưa chọn danh mục',
            'description.required'=>'Bạn chưa nhập mô tả',
            'price.required'=>'bạn chưa nhập giá',
            'image.required'=>'Bạn chưa chọn hình ảnh']);
    	$product = new Product;
    	$product->name=$request->name;
        $product->catalog_id=$request->category;
        $product->manufacture_id=$request->manufacture;
    	$product->description=$request->description;
        $product->price=$request->price;
        $file = $request->file('image');
        $file->move('source/images',$file->getClientOriginalName());
        $product->image_link= $file->getClientOriginalName();

    	$product->save();

    	return redirect('admin/product/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit($id){
         $cate = Catagory::all();
        $manu = Manufacture::all();
    	$product = Product::find($id);
    	return view('admin.product.edit',['product'=>$product,'manufacture'=>$manu,'category'=>$cate]);

    }
    public function postEdit(Request $request,$id){
    	$product = Product::find($id);
    	$this->validate($request,['name'=>'required|min:3|max:100|unique:manafacture,name',
            'category'=>'required','description'=>'required','price'=>'required'],
            ['name.required'=>'Bạn chưa nhập tên nhà sản xuất',
            'name.min'=>'Tên nhà sản xuất phải có độ dài từ 3 đến 100 ký tự',
            'name.max'=>'Tên nhà sản xuất phải có độ dài từ 3 đến 100 ký tự',
            'name.unique'=>'Tên nhà sản xuất đã tồn tại',
            'category.required'=>'Bạn chưa chọn danh mục',
            'description.required'=>'Bạn chưa nhập mô tả',
            'price.required'=>'bạn chưa nhập giá']);
        if($request->hasFile('image')){
            $file = $request->file('image');
        $file->move('source/images',$file->getClientOriginalName());
        unlink("source/images/".$product->image_link);
        $product->image_link= $file->getClientOriginalName();
        }
    	$product->name=$request->name;
        $product->catalog_id=$request->category;
        $product->manufacture_id=$request->manufacture;
        $product->description=$request->description;
        $product->price=$request->price;
        


        $product->save();
    	return redirect('admin/product/edit/'.$id)->with('thongbao','Sửa thành công');

    }

    public function getDelete($id){
    	$product = Product::find($id);
    	$product->delete();

    	return redirect('admin/product/list')->with('thongbao','Đã xóa thành công');

    }
}
