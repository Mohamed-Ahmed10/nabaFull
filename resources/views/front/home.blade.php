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
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-center">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Fresh Everyday</p>
								<h1>100% Organic Collection</h1>
								<div class="hero-btns">
									<a href="contact.html" class="boxed-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Mega Sale Going On!</p>
								<h1>Get December Discount</h1>
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
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box m-4 d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-binoculars"></i>
						</div>
						<div class="content">
							<h3>integrated vision</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box m-4 d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box m-4 d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>use the latest technology</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box m-4 d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-headset"></i>
						</div>
						<div class="content">
							<h3>Technical support team </h3>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box m-4 d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>Quick response</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box m-4 d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-building"></i>
						</div>
						<div class="content">
							<h3>Our branches are the closest to you</h3>
						</div>
					</div>
				</div>
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
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{asset('front/assets/img/products/construction.jpeg')}}"
									alt="construction"></a>
						</div>
						<h3>construction</h3>
						<p class="product-price"><span>What Happens When you Grow From 10 to 1000 Projects? Old Method
								Doesn’t Really Work As you
								Start to Grow & Need to Start Getting More Organized. You need to Know Exactly Where
								your
								Money are Going. The Professional ERP Construction System Gives you Complete Visibility
								to
								Track your Time and Costs. </span> </p>
						<a href="single-product.html" class="cart-btn"> Show more</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{asset('front/assets/img/products/estate_investment.jpeg')}}"
									alt="estate_investment"></a>
						</div>
						<h3>estate investment</h3>
						<p class="product-price"><span>What Happens When you Grow From 10 to 1000 Projects? Old Method
								Doesn’t Really Work As you
								Start to Grow & Need to Start Getting More Organized. You need to Know Exactly Where
								your
								Money are Going. The Professional ERP Construction System Gives you Complete Visibility
								to
								Track your Time and Costs. </span> </p>
						<a href="single-product.html" class="cart-btn"> Show more</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{asset('front/assets/img/products/production_and_factories.jpeg')}}"
									alt="production_and_factories"></a>
						</div>
						<h3>production and factories</h3>
						<p class="product-price"><span>What Happens When you Grow From 10 to 1000 Projects? Old Method
								Doesn’t Really Work As you
								Start to Grow & Need to Start Getting More Organized. You need to Know Exactly Where
								your
								Money are Going. The Professional ERP Construction System Gives you Complete Visibility
								to
								Track your Time and Costs. </span> </p>
						<a href="single-product.html" class="cart-btn"> Show more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- advertisement section -->
	<div class="abt-section pt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=EuPDCOxuXjA" class="video-play-btn popup-youtube"><i
								class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Since Year 2000</p>
						<h2>We are <span class="orange-text">Naba</span></h2>
						<p>NABA was established in 2000. We provides information systems, technical support, research,
							hardware, systematic and network</p>
						<a href="about.html" class="boxed-btn mt-4">know more</a>
					</div>
				</div>
			</div>
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

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-12">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Naba Computer was established in the year 2000 as a specialist in computer technologies with
							all its categories. Naba provides technical, informational and research support in hardware,
							systems and networks for all the government and private sector companies and establishments.
							The basic rule that governs the company's work is concentrating on the quality, because the
							high quality is the main target of the company, and we believe that the human factor is the
							most important element in the quality performance. Therefore the company always seeks to
							attract the best experts and specialists providing them with incentives in order to raise
							the productivity level, in addition to its concern with the work accuracy and the punctual
							commitment of implementation. For these reasons the various tasks are subjected to the
							reviewing and investigation in more than one stage and with different means to avoid even
							the smallest errors. And we tend to sign long-term contracts with our customers, which mean
							our full commitment with all what we give to them to insure our products permanency.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-12">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="">Products</a></li>
							<li><a href="">Articles</a></li>
							<li><a href="">Webinars</a></li>
							<li><a href="">Services</a></li>
							<li><a href="">Trainings</a></li>
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
        $('#sticker').removeClass('show_all');
    </script>
@endsection