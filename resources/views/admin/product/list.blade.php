@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Thể loại</th>
                                <th>Nhà sản xuất</th>
                                <th>Mô tả</th>
                                <th>Giá</th>
                         
                                <th>Ngày sản xuất</th>
                                <th>Ảnh</th>
                                <th>Lượt mua</th>
                                <th>Lượt xem</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $pro)
                            <tr class="odd gradeX" align="center">
                                <td>{{$pro->id}}</td>
                                <td>{{$pro->name}}</td>
                                <td>{{$pro->category->name}}</td>
                                <td>{{$pro->manafacture->name}}</td>
                                <td>{{$pro->description}}</td>
                                <td>{{$pro->price}}</td>
                         
                                <td>{{$pro->manufactured_date}}</td>
                                <td><img width="100px" src="source/images/{{$pro->image_link}}" /></td>
                                <td>{{$pro->count_buy}}</td>
                                <td>{{$pro->view}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{$pro->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$pro->id}}">Edit</a></td>
                            </tr>
                            @endforeach
                            
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection