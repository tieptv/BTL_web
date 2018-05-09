@extends('master')

@section('content')

        <div class="colorlib-shop">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                        <h2><span>Our Products</span></h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($product as $pro)
                    <div class="col-md-3 text-center">
                        <div class="product-entry">
                            <div class="product-img" style="background-image: url(source/images/{{$pro->image_link}});">
                                <p class="tag"><span class="sale">Sale</span></p>
                                <div class="cart">
                                    <p>
                                        <span class="addtocart"><a href="addCart/{{$pro->id}}"><i class="icon-shopping-cart"></i></a></span> 
                                        <span><a href="product/{{$pro->id}}"><i class="icon-eye"></i></a></span> 
                                        <span><a href="#"><i class="icon-heart3"></i></a></span>
                                        <span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
                                    </p>
                                </div>
                            </div>
                            <div class="desc">
                                <h3><a href="product/{{$pro->id}}">{{$pro->name}}</a></h3>
                                <p class="price"><span>${{$pro->price}}</span> </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
@endsection
