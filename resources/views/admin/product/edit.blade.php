@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>{{$product->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                     @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                        <form action="admin/product/edit/{{$product->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                             <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="name" placeholder="Please Enter Product Name" value="{{$product->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="category">
                                    @foreach($category as $cg)

                                     <option 
                                    @if($product->category->id==$cg->id) {{"selected"}}
                                    @endif
                                    value="{{$cg->id}}">{{$cg->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhà sản xuất</label>
                                <select class="form-control" name="manufacture">
                                    @foreach($manufacture as $mf)
                                    <option 
                                    @if($product->manafacture->id==$mf->id) {{"selected"}}
                                    @endif
                                    value="{{$mf->id}}">{{$mf->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo" class="form-control ckeditor" rows="3" name="description" placeholder="Please Enter Product Name">{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" name="price" placeholder="Please Enter Product Name" value="{{$product->price}}" />
                            </div>
                            <div class="form-group">
                                <label>Ngày sản xuất</label>
                                <input class="form-control" name="manufactured_date" value="{{$product->manufactured_date}}" />
                            </div>
                            <div  class="form-group">
                                <label>Hình ảnh</label>
                                <p>
                                <img width ="400px" src="source/images/{{$product->image_link}}">
                                </p>
                                <input type="file"  name="image" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Product Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection