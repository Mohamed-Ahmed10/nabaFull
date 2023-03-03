@extends('layouts.front.home')

<!-- title page -->
@section('title')
    <title>Naba soft company - Products</title>
@endsection
<!-- custom page -->
@section('css')

@endsection
@section('content')


	@isset($service)

	<div class="mt-150 mb-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="media my-5">
						<div class="row">
							<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
								<img src="{{asset($service->image)}}" width="400" class="mr-3"
									alt="Article image">
							</div>
							<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
								<div class="media-body">
									<h2 class="mt-0">{{$service->title}}</h5>
										<p>{{$service->description}}</p>
								</div>
								<button type="button" class="btn btn-outline-secondary mt-2 mb-2" tn
									btn-outline-secondary mt-2 mb-2" onclick="copyArticleUrl()">Copy link of service <i
										class="fas fa-share"></i></button>
								<a class="fb-xfbml-parse-ignore btn btn-primary" target="_blank"
									href="https://www.facebook.com/sharer/sharer.php?u={{route('front/service', $service->id)}}">Share
									with facebook</a>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>

	@endisset

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
								@isset($service)
									<input type="hidden" name="item_id" value="{{$service->id}}">
								@endisset
								<input type="hidden" name="section_no" value="4">
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

@endsection
<!-- custom js -->
@section('script')
<script>
	$('#services_active').addClass('current-list-item');
</script>
@isset($service)
<script>
	$('#service_active_<?php echo $service->id ?>').addClass('active');
</script>
@endisset
@endsection

