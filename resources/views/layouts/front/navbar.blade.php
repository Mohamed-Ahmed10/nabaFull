	<!-- header -->
	<div class="top-header-area show_all" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="{{route('front/index')}}">
								<img src="{{asset('front/assets/img/naba_logo.jpeg')}}" alt="This is the site logo" width="50">
							</a>
						</div>
						<!-- logo -->
						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li id="home_active"><a href="{{route('front/index')}}">Home</a>
								</li>
								<li id="products_active"><a href="{{route('front/products')}}">Products</a>
									<ul class="sub-menu">
										<li><a href="{{route('front/products')}}">All products</a></li>
                                        <hr>
										<?php
											use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
											// $nav_products = session()->get('nav_products');
											$nav_products = \App\Models\Product::translatedIn(LaravelLocalization::setLocale())->active()->get();
										?>
										@if(count($nav_products) > 0)
											@foreach($nav_products as $nav_product)
												<li id="product_active_<?php echo $nav_product->id ?>"><a href="{{route('front/product', $nav_product->id)}}"> {{$nav_product->title}}</a></li> <hr>
											@endforeach
										@endif
									</ul>
								</li>
								<li id="articles_active"><a href="{{route('front/articles')}}">Articles </a>
									<ul class="sub-menu">
										<li><a href="{{route('front/articles')}}">All articles</a></li>
                                        <hr>
										<?php
											// $nav_trainings = session()->get('nav_trainings');
											$nav_trainings = \App\Models\Article::translatedIn(LaravelLocalization::setLocale())->active()->get()
										?>
										@if(count($nav_trainings) > 0)
											@foreach($nav_trainings as $nav_article)
												<li id="article_active_<?php echo $nav_article->id ?>"><a href="{{route('front/article', $nav_article->id)}}">{{$nav_article->title}}</a></li><hr>
											@endforeach
										@endif
									</ul>
								</li>
								<li id="webinars_active"><a href="{{route('front/webinars')}}">Webinars </a>
									<ul class="sub-menu">
										<li><a href="{{route('front/webinars')}}">All webinars</a></li>
                                        <hr>
										<?php
											// $nav_webinars = session()->get('nav_webinars');
											$nav_webinars = \App\Models\Webinar::translatedIn(LaravelLocalization::setLocale())->active()->get();
										?>
										@if(count($nav_webinars) > 0)
											@foreach($nav_webinars as $nav_webinar)
												<li id="webinar_active_<?php echo $nav_webinar->id ?>"><a href="{{route('front/webinar', $nav_webinar->id)}}">{{$nav_webinar->name}}</a></li><hr>
											@endforeach
										@endif
									</ul>
								</li>
								<li id="services_active"><a href="{{route('front/services')}}">Services</a>
									<ul class="sub-menu">
										<li><a href="{{route('front/services')}}">All services</a></li>
                                        <hr>
										<?php
											// $nav_services = session()->get('nav_services');
											$nav_services = \App\Models\Service::translatedIn(LaravelLocalization::setLocale())->active()->get();
										?>
										@if(count($nav_services) > 0)
											@foreach($nav_services as $nav_service)
												<li id="service_active_<?php echo $nav_service->id ?>"><a href="{{route('front/service', $nav_service->id)}}">{{$nav_service->title}}</a></li><hr>
											@endforeach
										@endif
									</ul>
								</li>
								<li id="trainings_active"><a href="{{route('front/trainings')}}">Training </a>
									<ul class="sub-menu">
										<li><a href="{{route('front/trainings')}}">All Trainings</a></li>
                                        <hr>
										<?php
											// $nav_trainings = session()->get('nav_trainings');
											$nav_trainings = \App\Models\Training::translatedIn(LaravelLocalization::setLocale())->active()->get();
										?>
										@if(count($nav_trainings) > 0)
											@foreach($nav_trainings as $nav_training)
												<li id="training_active_<?php echo $nav_training->id ?>"><a href="{{route('front/training', $nav_training->id)}}">{{$nav_training->name}}</a></li>
                                                <hr>
											@endforeach
										@endif
									</ul>
								</li>
                                <li id="trainings_active"><a href="{{route('front/about')}}">About </a></li>
								<li><a href="#">Language </a>
									<ul class="sub-menu">
										@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
											<li>
												<a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
													{{ $properties['native'] }}
												</a>
											</li><hr>
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
