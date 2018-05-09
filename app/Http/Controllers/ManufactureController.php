<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacture;

class ManufactureController extends Controller
{
    public function getList(){
    	$manufacture = Manufacture::all();
    	return view('admin.manufacture.list',['manufacture'=>$manufacture]);
    }
    public function getAdd(){
    	return view('admin.manufacture.add');

    }
    public function postAdd(Request $request){
    	$this->validate($request,['name'=>'required|min:3|max:100|unique:manafacture,name',
            'country'=>'required|min:3|max:100'],
    		['name.required'=>'Bạn chưa nhập tên nhà sản xuất',
    		'name.min'=>'Tên nhà sản xuất phải có độ dài từ 3 đến 100 ký tự',
    		'name.max'=>'Tên nhà sản xuất phải có độ dài từ 3 đến 100 ký tự',
    		'name.unique'=>'Tên nhà sản xuất đã tồn tại',
            'country.required'=>'Bạn chưa nhập Tên quốc gia',
            'country.min'=>'Tên quốc gia phải có độ dài từ 3 đến 255 ký tự',
            'country.max'=>'Tên quốc gia phải có độ dài từ 3 đến 255 ký tự']);
    	$manufacture = new Manufacture;
    	$manufacture->name=$request->name;
    	$manufacture->description=$request->description;
        $manufacture->country=$request->country;

    	$manufacture->save();

    	return redirect('admin/manufacture/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit($id){
    	$manufacture = Manufacture::find($id);
    	return view('admin.manufacture.edit',['manufacture'=>$manufacture]);

    }
    public function postEdit(Request $request,$id){
    	$manufacture = Manufacture::find($id);
    	$this->validate($request,['name'=>'required|unique:manafacture,name|min:3|max:100',
            'description'=>'required|min:3|max:100',
            'country'=>'required|min:3|max:100'],
    		['name.required'=>'Bạn chưa nhập tên nhà sản xuất',
    		'name.unique'=>'Tên nhà sản xuất đã tồn tại',
    		'name.min'=>'Tên nhà sản xuất phải có độ dài từ 3 đến 100 ký tự',
    		'name.max'=>'Tên nhà sản xuất phải có độ dài từ 3 đến 100 ký tự',
    		'description.required'=>'Bạn chưa nhập mô tả',
    		'description.min'=>'Mô tả phải có độ dài từ 3 đến 255 ký tự',
    		'description.max'=>'Mô tả phải có độ dài từ 3 đến 255 ký tự',
            'country.required'=>'Bạn chưa nhập Tên quốc gia',
            'country.min'=>'Tên quốc gia phải có độ dài từ 3 đến 255 ký tự',
            'country.max'=>'Tên quốc gia phải có độ dài từ 3 đến 255 ký tự'
            ]);
    	$manufacture->name=$request->name;
    	$manufacture->description=$request->description;
        $manufacture->country=$request->country;
    	$manufacture->save();

    	return redirect('admin/manufacture/edit/'.$id)->with('thongbao','Sửa thành công');

    }

    public function getDelete($id){
    	$manufacture = Manufacture::find($id);
    	$manufacture->delete();

    	return redirect('admin/manufacture/list')->with('thongbao','Đã xóa thành công');

    }
}
