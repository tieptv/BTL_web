@extends('master')
@section('content')
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-push-2">
						<div class="row row-pb-lg">
							@foreach($product as $pro)
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(source/images/{{$pro->image_link}});">
										<p class="tag"><span class="new">New</span></p>
										<div class="cart">
											<p>
												<span class="addtocart"><a href="addCart/{{$pro->id}}"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="product/{{$pro->id}}"><i class="icon-eye"></i></a></span> 
												<span><a><i class="icon-heart3"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product/{{$pro->id}}">{{$pro->name}}</a></h3>
										<p class="price"><span>${{$pro->price}}</span></p>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">
							<div class="col-md-12">
								<ul class="pagination">
									@if($product->currentPage() != 1)
									<li><a href="{!! str_replace('/?','?',$product->url($product->currentPage() - 1)) !!}">&laquo;</a></li>
									@endif
									@for($i=1;$i<=$product->lastPage(); $i = $i + 1)
									<li class="{!! ($product->currentPage() != $i) ? 'active' : '' !!}"><a href="{!! str_replace('/?','?',$product->url($i)) !!}">{!! $i !!}</a></li>
									@endfor
									@if($product->currentPage() != $product->lastPage() )
									<li><a href="{!! str_replace('/?','?',$product->url($product->currentPage() + 1)) !!}">&laquo;</a></li>
									@endif
								</ul>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
@endsection