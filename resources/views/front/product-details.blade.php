@extends('layouts.front.home')

<!-- title page -->
@section('title')
    <title>Naba soft company - Products</title>
@endsection
<!-- custom page -->
@section('css')

@endsection
@section('content')

	@isset($product)
		<!-- breadcrumb-section -->
		<div class="breadcrumb-section">
			<!-- TODO Here is the video -->
			<video class="video_bg" src="https://construction.nabasoft.com/9.mp4" autoplay muted loop></video>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="breadcrumb-text">
							<span>{{$product->title}}®</span>
							<h1>{{$product->second_title}}</h1>
							<p>{{$product->description}}</p>
							<a href="#join" class="btn btn-primary btn-lg">Join us</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('flash::message')
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
									<i class="fas fa-home m-4 fa-4x"></i>
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
				<div class="row">
					<div class="col-lg-12">
						<div class="logo-carousel-inner">
							@isset($options_section_two_data)
								@foreach($options_section_two_data as $option_two)
									<div class="single-logo-item">
										<div class="card m-4">
											<div class="card-body">
												<i class="fas fa-th-list"></i>
												TODO list
											</div>
										</div>
									</div>
								@endforeach
							@endisset
						</div>
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
					</div>
				</div>
			</div>
		</section>
		<hr>
		<!-- contact form -->
		@include('front.comm.contact_us')
		<!-- end contact form -->

	@endisset

@endsection
<!-- custom js -->
@section('script')
@endsection
