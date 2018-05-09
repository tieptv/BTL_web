<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function getList(){
    	$slide = Slide::all();
    	return view('admin.slide.list',['slide'=>$slide]);
    }
    public function getAdd(){
    	return view('admin.slide.add');

    }
    public function postAdd(Request $request){
    	$this->validate($request,['name'=>'required|min:3|max:100|unique:manafacture,name',
            'content'=>'required','link'=>'required','image'=>'required'],
    		['name.required'=>'Bạn chưa nhập tên slide',
    		'name.min'=>'Tên slide phải có độ dài từ 3 đến 100 ký tự',
    		'name.max'=>'Tên slide có độ dài từ 3 đến 100 ký tự',
    		'name.unique'=>'Tên slide đã tồn tại',
            'content.required'=>'Bạn chưa nhập nội dung',
            'link.required'=>'Bạn chưa nhập link',
            
            'image.required'=>'Bạn chưa chọn hình ảnh']);
    	$slide = new Slide;
    	$slide->name=$request->name;
        $slide->content=$request->content;
        $slide->link=$request->link;
        $file = $request->file('image');
        $file->move('source/images',$file->getClientOriginalName());
        $slide->image= $file->getClientOriginalName();

    	$slide->save();

    	return redirect('admin/slide/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit($id){
         
    	$slide = Slide::find($id);
    	return view('admin.slide.edit',['slide'=>$slide]);

    }
    public function postEdit(Request $request,$id){
    	$slide = Slide::find($id);
    	$this->validate($request,['name'=>'required|min:3|max:100|unique:manafacture,name',
            'content'=>'required','link'=>'required'],
            ['name.required'=>'Bạn chưa nhập tên slide',
            'name.min'=>'Tên slide phải có độ dài từ 3 đến 100 ký tự',
            'name.max'=>'Tên slide có độ dài từ 3 đến 100 ký tự',
            'name.unique'=>'Tên slide đã tồn tại',
            'content.required'=>'Bạn chưa nhập nội dung',
            'link.required'=>'Bạn chưa nhập link'
            
          ]);
        $slide->name=$request->name;
        $slide->content=$request->content;
        $slide->link=$request->link;
       if($request->hasFile('image')){
            $file = $request->file('image');
        $file->move('source/images',$file->getClientOriginalName());
        unlink("source/images/".$slide->image);
        $slide->image= $file->getClientOriginalName();
        }
        $slide->save();

    	return redirect('admin/slide/edit/'.$id)->with('thongbao','Sửa thành công');

    }

    public function getDelete($id){
    	$slide = Slide::find($id);
    	$slide->delete();

    	return redirect('admin/slide/list')->with('thongbao','Đã xóa thành công');

    }
}
