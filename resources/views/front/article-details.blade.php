@extends('layouts.front.home')

<!-- title page -->
@section('title')
    <title>Naba soft company - Products</title>
@endsection
<!-- custom page -->
@section('css')

@endsection
@section('content')

	@include('flash::message')

	<div class="mt-150 mb-80">
		<div class="container">
			<div class="row">
				@isset($article)
					<div class="col-lg-12">
						<div class="media my-5">
							<div class="row">
								<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
									<img src="{{asset($article->image)}}" width="400" class="mr-3"
										alt="Article image">
								</div>
								<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
									<div class="media-body">
										<h5 class="mt-0">{{$article->title}}</h5>
										<p>{{$article->description}}</p>
									</div>
									<button type="button" id="liveToastBtn" class="btn btn-outline-secondary mt-2 mb-2"
										onclick="copyArticleUrl()"> Share this article <i class="fas fa-share"></i></button>
								</div>
							</div>
						</div>
					</div>
				@endisset
				<div class="col-lg-4">
					<div class="sidebar-section">
						<div class="recent-posts">
							<h4>Recent Posts</h4>
							<ul>
								<li><a href="#">You will vainly look for fruit on it in autumn.</a></li>
								<li><a href="#">A man's worth has its season, like tomato.</a></li>
								<li><a href="#">Good thoughts bear good fresh juicy fruit.</a></li>
								<li><a href="#">Fall in love with the fresh orange</a></li>
								<li><a href="#">Why the berries always look delecious</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<!-- end single article section -->
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
						<form type="POST" id="fruitkha-contact">
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
								<input type="tel" placeholder="Mobile number" name="phone" id="phone" required>
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

@endsection
<!-- custom js -->
@section('script')
@endsection
