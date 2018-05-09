@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
       <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">Nhà sản xuất
                            <small>{{$manufacture->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
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
                        <form action="admin/manufacture/edit/{{$manufacture->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Tên nhà sản xuất</label>
                                <input class="form-control" name="name" placeholder="Please Enter Manufacture Name" value="{{$manufacture->name}}" />
                            </div>
                             <div class="form-group">
                                <label>Quốc gia</label>
                                <input class="form-control" name="country" placeholder="Please Enter Manufacture Name" value="{{$manufacture->country}}" />
                            </div>
                            
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" rows="3" name="description"> {{$manufacture->description}}</textarea>
                            </div>
                           
                            <button type="submit" class="btn btn-default">Manufacture Edit</button>
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