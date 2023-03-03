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

	<!-- breadcrumb-section -->
	<div class="show_all_header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb-text">
						<h1>Naba trainings</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-100 mb-150">
		<div class="container">
			<div class="row">
				@isset($trainings)
					@foreach($trainings as $training)
						<div class="col-lg-4 col-md-6 p-2">
							<!-- TODO:This will be the link of service   -->
							<div class="single-latest-product">
								<div class="latest-news-bg news-bg-1"></div>
								<div class="news-text-box">
									<h4 class="text-center"><a href="{{route('front/training', $training->id)}}">ElMohtaref <br> {{$training->name}}</a></h4>
									<img src="{{asset($training->image)}}" alt="sample">
									<p class="blog-meta">
										<div class="author"><i class="fas fa-user"></i>  {{$training->instructor}}</div>
										<div class="date"><i class="fas fa-calendar"></i>  From : {{$training->date_from}}</div>
										<div class="date"><i class="fas fa-calendar"></i>  To : {{$training->date_to}}</div>
										<?php
											if((int)$training->cost > 0){ $cost = '<h6><span class="badge badge-warning">Paid</span> $ '. $training->cost .'</h6>'; }
											else{ $cost = '<h6><span class="badge badge-success">Free</span></h6>'; }
										?>
										{!! $cost !!}
									</p>
									<p class="mt-2">{{$training->description}}</p>
									<a href="{{route('front/training', $training->id)}}" class="read-more-btn" target="_blank">read more <i	class="fas fa-angle-right"></i></a>
								</div>
							</div>
						</div>
					@endforeach
				@endisset
			</div>
		</div>
	</div>
	<!-- end latest news -->
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
	$('#trainings_active').addClass('current-list-item');
</script>
@endsection
