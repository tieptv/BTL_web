<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagory;

class CategoryController extends Controller
{
    public function getList(){
    	$category = Catagory::all();
    	return view('admin.category.list',['category'=>$category]);
    }
    public function getAdd(){
    	return view('admin.category.add');

    }
    public function postAdd(Request $request){
    	$this->validate($request,['name'=>'required|min:3|max:100|unique:category,name'],
    		['name.required'=>'Bạn chưa nhập tên thể loại',
    		'name.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    		'name.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    		'name.unique'=>'Tên thể loại đã tồn tại']);
    	$category = new Catagory;
    	$category->name=$request->name;
    	$category->description=$request->description;
    	$category->save();

    	return redirect('admin/category/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit($id){
    	$category = Catagory::find($id);
    	return view('admin.category.edit',['category'=>$category]);

    }
    public function postEdit(Request $request,$id){
    	$category = Catagory::find($id);
    	$this->validate($request,['name'=>'required|unique:category,name|min:3|max:100','description'=>'required|min:3|max:100'],
    		['name.required'=>'Bạn chưa nhập tên thể loại',
    		'name.unique'=>'Tên thể loại đã tồn tại',
    		'name.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    		'name.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    		'description.required'=>'Bạn chưa nhập mô tả',
    		'description.min'=>'Mô tả phải có độ dài từ 3 đến 255 ký tự',
    		'description.max'=>'Mô tả phải có độ dài từ 3 đến 255 ký tự']);
    	$category->name=$request->name;
    	$category->description=$request->description;
    	$category->save();

    	return redirect('admin/category/edit/'.$id)->with('thongbao','Sửa thành công');

    }

    public function getDelete($id){
    	$category = Catagory::find($id);
    	$category->delete();

    	return redirect('admin/category/list')->with('thongbao','Đã xóa thành công');

    }
}
