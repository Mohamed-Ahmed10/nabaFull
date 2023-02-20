@extends('layouts.front.home')

<!-- title page -->
@section('title')
    <title>Naba soft company</title>
@endsection
<!-- custom page -->
@section('css')
@endsection
@section('content')

    <!-- home page slider -->
    <div class="homepage-slider">
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Fresh & Organic</p>
								<h1>Delicious Seasonal Fruits</h1>
								<div class="hero-btns">
									<a href="contact.html" class="boxed-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="single-homepage-slider homepage-bg-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Fresh & Organic</p>
								<h1>Delicious Seasonal Fruits</h1>
								<div class="hero-btns">
									<a href="contact.html" class="boxed-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="single-homepage-slider homepage-bg-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Fresh & Organic</p>
								<h1>Delicious Seasonal Fruits</h1>
								<div class="hero-btns">
									<a href="contact.html" class="boxed-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- end home page slider -->
	@include('flash::message')
	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">
			<div class="row">
				@isset($about_section)
					@foreach($about_section as $about)
						<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
							<div class="list-box m-4 d-flex align-items-center">
								<div class="list-icon">
									<!-- <i class="fas fa-binoculars"></i> -->
									<img src="{{asset($about->image)}}" width="65" alt="">
								</div>
								<div class="content">
									<h3>{{$about->title}}</h3>
								</div>
							</div>
						</div>
					@endforeach
				@endisset
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-50 mb-50 pt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Our</span> Products</h3>
						<p>We offer you the best services at the best prices.</p>
					</div>
				</div>
			</div>
			<div class="row">
				@isset($products)
					@foreach($products as $product)
						<div class="col-lg-4 col-md-6 text-center">
							<div class="single-product-item">
								<div class="product-image">
									<a href="{{route('front/product', $product->id)}}"><img src="{{asset($product->image)}}" alt="construction"></a>
								</div>
								<h3>{{$product->title}}</h3>
								<p class="product-price"><span>{{$product->description}}</span> </p>
								<a href="{{route('front/product', $product->id)}}" class="cart-btn"> Show more</a>
							</div>
						</div>
					@endforeach
				@endisset
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- advertisement section -->
	<div class="abt-section pt-5">
		<div class="container">
			@isset($setting)
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="abt-bg">
							<a href="{{$setting->video_link}}" class="video-play-btn popup-youtube"><i
									class="fas fa-play"></i></a>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="abt-text">
							<p class="top-sub">Since Year 2000</p>
							<h2>We are <span class="orange-text">{{$setting->title}}</span></h2>
							<p>{{$setting->second_title}}</p>
							<a href="about.html" class="boxed-btn mt-4">know more</a>
						</div>
					</div>
				</div>
			@endisset
		</div>
	</div>
	<!-- cart banner section -->
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
						<form role="form" action="{{url(route('front/contact-us'))}}" method="post">
							@csrf
							<div class="m-3">
								<input type="text" placeholder="Name" name="name" id="name" required>
								<input type="text" placeholder="Company name" name="company_name" id="company_name"	required>
								<input type="email" placeholder="Email" name="email" id="email" required>
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
								<input type="tel" placeholder="Mobile number" name="phone" id="phone" required>
							</div>
							<div class="m-3">
								<textarea name="notes" id="" cols="30" rows="10" placeholder="Enter your message"></textarea>
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

@endsection
<!-- custom js -->
@section('script')
    <script>
        $('#sticker').removeClass('show_all');
    </script>
@endsection
