@extends('master')
@section('content')
	<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(source/images/cover-img-1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Checkout</h1>
				   					<h2 class="bread"><span><a href="index.html">Home</a></span> <span><a href="cart.html">Shopping Cart</a></span> <span>Checkout</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<a href="cart"><h3>Shopping Cart</h3></a>
							</div>
							<div class="process text-center active">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
						<form action= "order" method="post" enctype="multipart/form-data" class="colorlib-form">
							{{csrf_field()}}
						@if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
							<h2>Billing Details</h2>
		              	<div class="row">
			    
			               <div class="form-group">
								<div class="col-md-6">
									<label for="name">Name</label>
									<input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name" >
								</div>
								<div class="col-md-6">
										<label for="Phone">Phone Number</label>
										<input type="text" id="phone" name="phone"class="form-control" placeholder="Enter Your Phone">
								</div>
							</div>
			               <div class="col-md-12">
								<div class="form-group">
									
										<label for="name">Address</label>
			                    		<input type="text" name="address" id="address" class="form-control" placeholder="Enter Your Address">
			                    	
			                    	
								</div>
			               </div>
			               
							<div class="col-md-12">
			                  <div class="form-group">
			                  	<label for="country">Note</label>
			                    <input type="text" id="note" name="note" class="form-control" placeholder="Enter Your Note">
			                  </div>
			               </div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
										  <label><input type="radio" name="optradio">Create an Account? </label>
										  <label><input type="radio" name="optradio"> Ship to different address</label>
										</div>
									</div>
								</div>
		              </div>
		            	
					</div>
					<div class="col-md-5">
						<div class="cart-detail">
							<h2>Cart Total</h2>
							<ul>
								<li>
									<span>Subtotal</span> <span>${{Cart::Subtotal()}}</span>
									<ul>
										@foreach($cart as $item)
										<li><span>{{$item->qty}} x {{$item->name}}</span> <span>${{$item->price}}</span></li>
										@endforeach
									</ul>
								</li>
								<li><span>Shipping</span> <span>$0.00</span></li>
								<li><span>Order Total</span> <span>${{Cart::Subtotal()}}</span></li>
							</ul>
						</div>
						<div class="cart-detail">
							<h2>Payment Method</h2>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
									   <label><input type="radio" id="payment" name="payment" value="Direct Bank Tranfer">Direct Bank Tranfer</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
									   <label><input type="radio" id="payment" name="payment" value="Check Payment">Check Payment</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
									   <label><input type="radio" id="payment" name="payment" value="Paypal">Paypal</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="checkbox">
									   <label><input type="checkbox" value="">I have read and accept the terms and conditions</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p><a href="#" class="btn btn-primary">Place an order</a>
								<button type="submit" class="btn btn-success" style="width: 250px; margin-bottom: 10px">THANH TOÁN</button><br></p>
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>

@endsection