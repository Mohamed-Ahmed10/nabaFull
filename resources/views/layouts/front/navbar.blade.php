	<!-- header -->
	<div class="top-header-area show_all" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="{{route('front/index')}}">
								<img src="{{asset('front/assets/img/naba_logo.jpeg')}}" alt="This is the site logo" width="70">
							</a>
						</div>
						<!-- logo -->
						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="{{route('front/index')}}">Home</a>
								</li>
								<li><a href="{{route('front/products')}}">Products</a>
									<ul class="sub-menu">
										<li><a href="{{route('front/products')}}">All products</a></li>
										<li><a href="show-product.html">ElMohtaref for contracting companies</a></li>
										<li><a href="show-product.html">ElMohtaref for real estate investment</a></li>
										<li><a href="show-product.html">ElMohtaref for educational institutions</a></li>
										<li><a href="show-product.html">ElMohtaref for human resources</a></li>
										<li><a href="show-product.html">ElMohtaref for production and factories</a></li>
										<li><a href="show-product.html">ElMohtaref for manage transportation
												companies</a></li>
										<li><a href="show-product.html">ElMohtaref for charitable institutions and
												endowments</a></li>
									</ul>
								</li>
								<li><a href="{{route('front/articles')}}">Articles </a>
									<ul class="sub-menu">
										<li><a href="{{route('front/articles')}}">All articles</a></li>
										<li><a href="show-article.html">article</a></li>
										<li><a href="show-article.html">article</a></li>
										<li><a href="show-article.html">article</a></li>
										<li><a href="show-article.html">article</a></li>
										<li><a href="show-article.html">article</a></li>
									</ul>
								</li>
								<li><a href="{{route('front/webinars')}}">Webinars </a>
									<ul class="sub-menu">
										<li><a href="{{route('front/webinars')}}">All webinars</a></li>
										<li><a href="show-webinar.html">webinar</a></li>
										<li><a href="show-webinar.html">webinar</a></li>
										<li><a href="show-webinar.html">webinar</a></li>
										<li><a href="show-webinar.html">webinar</a></li>
										<li><a href="show-webinar.html">webinar</a></li>
									</ul>
								</li>
								<li><a href="#">Services</a>
									<ul class="sub-menu">
										<li><a href="services.html">All services</a></li>
										<li><a href="show-service.html">Employee training</a></li>
										<li><a href="show-service.html">Fully operational</a></li>
										<li><a href="show-service.html">Technical support</a></li>
										<li><a href="show-service.html">Software tests</a></li>
										<li><a href="show-service.html">Consulting</a></li>
									</ul>
								</li>
								<li><a href="#">Training </a>
									<ul class="sub-menu">
										<li><a href="trainings.html">All trainings</a></li>
										<li><a href="show-training.html">training</a></li>
										<li><a href="show-training.html">training</a></li>
										<li><a href="show-training.html">training</a></li>
										<li><a href="show-training.html">training</a></li>
										<li><a href="show-training.html">training</a></li>
									</ul>
								</li>
								<li><a href="#">Language </a>
									<ul class="sub-menu">
										@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
											<li>
												<a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
													{{ $properties['native'] }}
												</a>
											</li>
										@endforeach
									</ul>
								</li>
								<!-- <li> -->
									<!-- <a class="mobile-show change-language change-language-desktop" href="index-ar.html">عربى</a> -->
									<!-- <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a> -->
								<!-- </li> -->
							</ul>
						</nav>
						<a class="mobile-show change-language" href="index-ar.html">عربى</a>
						<!-- <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a> -->
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search arewa -->