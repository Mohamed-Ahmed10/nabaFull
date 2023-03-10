@extends('layouts.front.home')

<!-- title page -->
@section('title')
    <title>Naba soft company - Products</title>
@endsection
<!-- custom page -->
@section('css')

@endsection
@section('content')
<div class="vat">
		<img src="{{asset('front/assets/img/1.png')}}" alt="Vat" height="100">
		<img src="{{asset('front/assets/img/vat-21.png')}}"  alt="Vat" height="100">
	</div>
	@isset($product)
		<!-- breadcrumb-section -->
		<div class="breadcrumb-section">
			<!-- TODO Here is the video -->
			<video class="video_bg" src="https://construction.nabasoft.com/9.mp4" autoplay muted loop></video>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="breadcrumb-text">
                            <!-- Amr needs  -->
							<span style="color: {{$product->color_title}}">{{$product->title}}®</span>
							<h1>{{$product->second_title}}</h1>
							<p>{{$product->description}}</p>
							<a href="#join" class="btn btn-primary btn-lg">Join us</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- single article section -->
		<div class="pt-5 pb-5 text-center product-section">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="single-article-section">
							<div class="single-article-text">
								<h2>WHY CHOOSE US</h2>
								<p class="mb-5">{{$product->second_description}}</p>
							</div>
						</div>
					</div>
					@isset($options_section_one_data)
						@foreach($options_section_one_data as $option_one)
							<div class="col-lg-4 col-sm-12 p-3">
								<div class="card h-100 wow fadeInUp" data-wow-offset="300">
                                    <img src="{{asset($option_one->icon)}}" width="70">
									<div class="card-body">
										<h5 class="card-title">{{$option_one->title}}</h5>
										<p class="card-text">{{$option_one->description}}</p>
									</div>
								</div>
							</div>
						@endforeach
					@endisset
				</div>
			</div>
		</div>

		<!-- logo carousel -->
		<div class="logo-carousel-section">
			<div class="container">
				<h4 class="text-center">THOSE ARE JUST A FEW MAIN FEATURES, THERE ARE PLENTY MORE</h4>
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

					@isset($options_section_two_data)
						<?php $loop_count = count($options_section_two_data) / 2; ?>
						@for ($ii = 1; $ii < round($loop_count); $ii++)
							<li data-target="#carouselExampleIndicators" data-slide-to="{{$ii}}"></li>
						@endfor
					@endisset
				</ol>
				<div class="carousel-inner">
					<?php $loop_index = 0; ?>
					@isset($options_section_two_data)
						@for ($i = 0; $i < count($options_section_two_data) - 1; $i++)
							<?php if($loop_index == 0 ){ $active = 'active'; }else{ $active = ''; } ?>
							<div class="carousel-item {{$active}}">
								<div class="row">
									<div class="card-body">
										<img src="{{asset($options_section_two_data[$i]['icon'])}}" width="70" alt="">
										{{$options_section_two_data[$i]['title']}}
									</div>
									<?php $i++; ?>
									<div class="card-body">
										<img src="{{asset($options_section_two_data[$i]['icon'])}}" width="70" alt="">
										{{$options_section_two_data[$i]['title']}}
									</div>
								</div>
							</div>
							<?php $loop_index++; ?>
						@endfor
					@endisset
				</div>
			</div>
			</div>
		</div>
		<!-- end logo carousel -->
		<section class="shop-banner">
			<div class="container">
				<div class="row">
					<div class="my-3 col-lg-6 col-12">
						<!-- <iframe class="video_iframe" width="560" height="315"
							src="{{$product->video_link}}" title="YouTube video player" frameborder="0"
							allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
							allowfullscreen></iframe> -->
						{!! $product->video_link !!}
					</div>
					<div class="my-3 col-lg-6 col-12">
						<h3>{{$product->video_title}}</h2>
							<p>{{$product->video_description}}</p>
							<p class="text-primary">
								Watch next video for a quick idea about The Professional® ERP Construction system
							</p>
							<a class="fb-xfbml-parse-ignore btn btn-primary" target="_blank"
									href="https://www.facebook.com/sharer/sharer.php?u={{route('front/product', $product->id)}}">
									Share with facebook</a>
					</div>
				</div>
			</div>
		</section>
		<hr>

		@include('flash::message')
		<!-- contact form -->
		<div class="contact-from-section mt-5 mb-5" id="join">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 mb-5 mb-lg-0">
						<div class="form-title">
							<h2>You want to join this</h2>
							<p>You can join out community and we will contact you</p>
						</div>
						<div id="form_status"></div>
						<div class="contact-form">
							<form role="form" action="{{url(route('front/contact-us'))}}" method="post">2
								@csrf
								<div class="m-3">
									@isset($product)
										<input type="hidden" name="item_id" value="{{$product->id}}">
									@endisset
									<input type="hidden" name="section_no" value="1">
									<input type="text" placeholder="Name" name="name" id="name" required>
									@error('name')
										<span class="text-danger">{{$message}}</span>
									@enderror
									<input type="text" placeholder="Company name" name="company_name" id="company_name"	required>
									@error('company_name')
										<span class="text-danger">{{$message}}</span>
									@enderror
									<input type="email" placeholder="Email" name="email" id="email" required>
									@error('email')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="m-3">
									<select name="country" id="" required>
										<option disabled selected hidden style="color:#DDD">Select your country</option>
										<option value="Saudi Arabia">Saudi Arabia</option>
										<option value="Egypt">Egypt</option>
										<option value="Jordan">Jordan</option>
										<option value="Oman">Oman</option>
										<option value="UAE">UAE</option>
										<option value="Libya">Libya</option>
										<option value="Bahrain">Bahrain</option>
										<option value="Tunisia">Tunisia</option>
										<option value="Morocco">Morocco</option>
										<option value="Kuwait">Kuwait</option>
										<option value="Qatar">Qatar</option>
										<option value="Algeria">Algeria</option>
										<option value="Somalia">Somalia</option>
										<option value="Iraq">Iraq</option>
										<option value="Syrian">Syrian</option>
										<option value="Palestine">Palestine</option>
										<option value="Lebanon">Lebanon</option>
										<option value="Other - Record the international phone number">Other - Record the international phone number</option>
									</select>
									@error('country')
										<span class="text-danger">{{$message}}</span>
									@enderror
									<input type="tel" placeholder="Mobile number" name="phone" id="phone" required>
									@error('phone')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="m-3">
									<textarea name="notes" id="" cols="30" rows="10" placeholder="Enter your message"></textarea>
									@error('notes')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div> 
								<div class="m-3">
									{!! NoCaptcha::renderJs() !!}
									{!! NoCaptcha::display() !!}
								</div> 
								<div class="m-3">
									<input type="submit" value="Submit">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end contact form -->

	@endisset

@endsection
<!-- custom js -->
@section('script')
<script>
	$('#products_active').addClass('current-list-item');
</script>
@isset($product)
<script>
	$('#product_active_<?php echo $product->id ?>').addClass('active');
</script>
@endisset
@endsection
