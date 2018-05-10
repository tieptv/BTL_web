<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Catagory;
use App\Manufacture;
use App\User;


class UserController extends Controller
{
public function getList(){
    	$user = User::orderBy('id','DESC')->get();
    	return view('admin.user.list',['user'=>$user]);
    }
public function getAdd(){
    
    	return view('admin.user.add');

    }
    
     public function postAdd(Request $request){
    	$this->validate($request,['name'=>'required|min:3|max:30',
            'email'=>'required|email','address'=>'required','phone'=>'required|min:10|max:11','password'=>'required|min:6'],
    		['name.required'=>'Bạn chưa nhập tên',
    		'name.min'=>'Tên nhà sản xuất phải có độ dài từ 3 đến 30 ký tự',
    		'name.max'=>'Tên nhà sản xuất phải có độ dài từ 3 đến 30 ký tự',
    		'email.required'=>'Bạn chưa nhập email',
    		'email.email'=>'Bạn chưa nhập đúng email',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Mạp khẩu tối thiểu 6 kí tự']);
    	$user = new User;
    	$user->name=$request->name;
        $user->email=$request->email;
        $user->address=$request->address;
    	$user->phone=$request->phone;
    	$user->password=$request->password;
        
    	$user->save();

    	return redirect('admin/user/add')->with('thongbao','Thêm thành công');
    }
 
 public function getEdit($id){
    	$user = User::find($id);
    	return view('admin.user.edit',['user'=>$user]);

    }
    public function postEdit(Request $request,$id){
    	$user = User::find($id);
    	$this->validate($request,['name'=>'required|min:3|max:30',
            'email'=>'required|email','address'=>'required','phone'=>'required|min:10|max:11','password'=>'required|min:6'],
    		['name.required'=>'Bạn chưa nhập tên',
    		'name.min'=>'Tên nhà sản xuất phải có độ dài từ 3 đến 30 ký tự',
    		'name.max'=>'Tên nhà sản xuất phải có độ dài từ 3 đến 30 ký tự',
    		'email.required'=>'Bạn chưa nhập email',
    		'email.email'=>'Bạn chưa nhập đúng email',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Mạp khẩu tối thiểu 6 kí tự']);
    	$user->name=$request->name;
        $user->email=$request->email;
        $user->address=$request->address;
    	$user->phone=$request->phone;
    	$user->password=$request->password;
        
    	$user->save();

    	return redirect('admin/user/edit/'.$id)->with('thongbao','Sửa thành công');

    }

    public function getDelete($id){
    	$user = User::find($id);
    	$user->delete();

    	return redirect('admin/user/list')->with('thongbao','Đã xóa thành công');

    }
















}
































