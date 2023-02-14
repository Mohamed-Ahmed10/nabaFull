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
							<form type="POST" id="fruitkha-contact" >
								<div class="m-3">
									<input type="text" placeholder="Name" name="name" id="name" required>
									<input type="text" placeholder="Company name" name="company_name" id="company_name"
										required>
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
										<option value="Other - Record the international phone number">Other - Record the
											international phone number</option>
									</select>
									<input type="tel" placeholder="Mobile numer" name="phone" id="phone" required>
								</div>
								<div class="m-3">
									<textarea name="" id="" cols="30" rows="10" placeholder="Enter your message"></textarea>
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
		<div class="footer-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12">
						<div class="footer-box about-widget">
							<h2 class="widget-title">About us</h2>
							<p>Naba Soft was established in 2000 as a specialist in all fields of computer technologies. It
								provides technical support, research, information, hardware, systematic and network support
								to all governmental and private sector companies and establishments. We have developed the
								experience that we acquired throughout many years</p>
						</div>
					</div>
					<div class="col-lg-8 col-md-12">
						<div class="footer-box pages get-in-touch">
							<h2 class="widget-title">Contact Us</h2>
							<ul>
								<ul class="row">
									<li class="col-lg-4 col-sm-12">
										<h6>Dubai Office</h6>
										<div>
											<a href="tel:971552243426">+971-552243426</a>
											<i class="fas fa-phone-volume m-1"></i>
											<a href="https://wa.me/971552243426" target="_blank"><i
													class="fab fa-whatsapp m-1"></i></a>
										</div>
									</li>
									<li class="col-lg-4 col-sm-12">
										<h6>Riyadh Office</h6>
										<div>
											<a href="tel:966570005134">+966-570005134</a>
											<i class="fas fa-phone-volume m-1"></i>
											<a href="https://wa.me/966570005134" target="_blank"><i
													class="fab fa-whatsapp m-1"></i></a>
										</div>
									</li>
									<li class="col-lg-4 col-sm-12">
										<h6>R.A.K Office</h6>
										<div>
											<a href="tel:971589618351">+971-589618351</a>
											<i class="fas fa-phone-volume m-1"></i>
											<a href="https://wa.me/971589618351" target="_blank"><i
													class="fab fa-whatsapp m-1"></i></a>
										</div>
									</li>
									<li class="col-lg-4 col-sm-12">
										<h6>Muscat Office</h6>
										<div>
											<a href="tel:96891113014">+968-91113014</a>
											<i class="fas fa-phone-volume m-1"></i>
											<a href="https://wa.me/96891113014" target="_blank"><i
													class="fab fa-whatsapp m-1"></i></a>
										</div>
									</li>
									<li class="col-lg-4 col-sm-12">
										<h6>Cairo Office</h6>
										<div>
											<a href="tel:201020111351">+20-1020111351</a>
											<i class="fas fa-phone-volume m-1"></i>
											<a href="https://wa.me/01020111351" target="_blank"><i
													class="fab fa-whatsapp m-1"></i></a>
										</div>
									</li>
								</ul>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end footer -->
	@endisset

@endsection
<!-- custom js -->
@section('script')
@endsection