@extends('master')
@section('content')
	<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<h3>Contact Information</h3>
						<div class="row contact-info-wrap">
							<div class="col-md-3">
								<p><span><i class="icon-location"></i></span> 198 Bạch Mai, Hai Bà Trưng, Hà Nội <br> 176 Thái hà, Đống Đa, Hà Nội</p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-phone3"></i></span> <a href="tel://0164567920">+ 04 2355 98</a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-paperplane"></i></span> <a href="mailto:ngaa1leloi@gmail.com">ngaa1leloi@gmail.com</a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-globe"></i></span> <a href="#">yoursite.com</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1">
						<div class="contact-wrap">
							<h3>Get In Touch</h3>

			 	  	@if($errors->count() >0)
					@foreach($errors as $err)
						<div class="alert alert-danger">{{$err}}</div>
					@endforeach
					@endif
					@if(Session::has('message'))
						<div class="alert alert-success">{{Session::get('message')}}</div>
					@endif
							<form action="{{route('contact')}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								<div class="row form-group">
									<div class="col-md-12 padding-bottom">
										<label for="name">Name</label>
										<input type="text" id="name" name="name" class="form-control" placeholder="Your Name">
									</div>
									
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="email">Email</label>
										<input type="text" id="email" name="email" class="form-control" placeholder="Your email address">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="subject">Title</label>
										<input type="text" id="title" name="title" class="form-control" placeholder="Your Title of this message">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="message">Message</label>
										<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
									</div>
								</div>
								<div class="form-group text-center">
									<input type="submit" value="Send Message" class="btn btn-primary">
								</div>
							</form>		
						</div>
					</div>
				</div>
			</div>
		</div>


@endsection