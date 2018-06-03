<nav class="colorlib-nav" role="navigation">
	<div class="top-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="colorlib-logo"><a href="{{route('homePage')}}">Beauty Shop</a></div>
				</div>
				<div class="col-xs-4">
						
						<div class="search">
	        				<form action="{{route('search')}}" method="GET" enctype="multipart/form-data">
	        		        	<input type="text" name="key" class="searchTerm">
				                 <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>Search
     </button>
                          
	       		 			</form>	  
		    			</div>
		    	
				</div>
				<div class="col-xs-14 text-right menu-1">
					<ul>
					
						<li class="active"><a href="homePage">Home</a></li>
						<li class="has-dropdown">
							<a href="shop">Shop</a>
							<ul class="dropdown">
								<li><a href="{{route('cart')}}">Shipping Cart</a></li>
								<li><a href="{{route('order')}}">Checkout</a></li> 
								
							</ul>
						</li>
						<li class="has-dropdown">
							<a href="{{route('shop')}}">Menu</a>
							<ul class="dropdown">
								@foreach($category as $cate)
								<li><a href="{{route('product_type',$cate->id)}}">{{$cate->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="source/blog.html">Blog</a></li>
						<li><a href="{{route('about')}}">About</a></li>
						<li><a href="{{route('contact')}}">Contact</a></li>
						<li><a href="{{route('cart')}}"><i class="icon-shopping-cart"></i> Cart [${{Cart::Subtotal()}}]</a></li>
						
						 @if(Auth::check())
			<ul>
			   <li class="active" style="margin-right: 20px;"><a href="homePage">{{Auth::User()->name}}</a></li> 
			   <li class="active"><a href="{{route('logout')}}">Logout</a></li> 
			</ul>
      			@else
			<ul>
			    <li class="active" style="margin-right: 20px;"><a href="{{route('login')}}">Login</a></li> 
			    <li class="active"><a href="{{route('register')}}">Register</a></li> 
			</ul>
			@endif
			
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>