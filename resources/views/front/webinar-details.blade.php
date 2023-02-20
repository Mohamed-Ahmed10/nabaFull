@extends('layouts.front.home')

<!-- title page -->
@section('title')
    <title>Naba soft company - Products</title>
@endsection
<!-- custom page -->
@section('css')

@endsection
@section('content')


	@isset($webinar)


		@include('flash::message')
		<!-- single article section -->
        <div class="mt-150 mb-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="media my-5">
						<div class="row">
							<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
								<img src="{{asset('front/assets/img/products/estate_investment.jpeg')}}" width="400" class="mr-3"
									alt="Article image">
							</div>
							<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
								<div class="media-body">
									<h2>{{$webinar->name}}</h2>
									<div class="date"><i class="fas fa-calendar"></i> 30 - 12 - 2023</div>
									<div class="date"><i class="far fa-clock"></i> 12:00 PM</div>
									<div class="date"><i class="fas fa-stopwatch"></i></i></i> 4 Days</div>
									<h6><span class="badge badge-warning">Paid</span> 16 $</h6>
									<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut, laboriosam repellat
										fugiat eos error nostrum a sint eaque, eum voluptas quidem! Exercitationem animi
										voluptatem cumque perferendis deserunt cum, ipsam modi. Lorem ipsum dolor sit,
										amet consectetur adipisicing elit. Doloremque ad non ea qui, error rem unde
										maxime molestias vitae et perferendis at asperiores, voluptatum quod
										exercitationem labore sint iste repellendus. Lorem ipsum, dolor sit amet
										consectetur adipisicing elit. Ut, laboriosam repellat
										fugiat eos error nostrum a sint eaque, eum voluptas quidem! Exercitationem animi
										voluptatem cumque perferendis deserunt cum, ipsam modi. Lorem ipsum dolor sit,
										amet consectetur adipisicing elit. Doloremque ad non ea qui, error rem unde
										maxime molestias vitae et perferendis at asperiores, voluptatum quod
										exercitationem labore sint iste repellendus.
										Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut, laboriosam
										repellat
										fugiat eos error nostrum a sint eaque, eum voluptas quidem! Exercitationem animi
										voluptatem cumque perferendis deserunt cum, ipsam modi. Lorem ipsum dolor sit,
										amet consectetur adipisicing elit. Doloremque ad non ea qui, error rem unde
										maxime molestias vitae et perferendis at asperiores, voluptatum quod
										exercitationem labore sint iste repellendus.
										Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut, laboriosam
										repellat
										fugiat eos error nostrum a sint eaque, eum voluptas quidem! Exercitationem animi
										voluptatem cumque perferendis deserunt cum, ipsam modi. Lorem ipsum dolor sit,
										amet consectetur adipisicing elit. Doloremque ad non ea qui, error rem unde
										maxime molestias vitae et perferendis at asperiores, voluptatum quod
										exercitationem labore sint iste repellendus.</p>
								</div>
								<button type="button" class="btn btn-outline-secondary mt-2 mb-2" tn
									btn-outline-secondary mt-2 mb-2" onclick="copyArticleUrl()">Copy link of webinar <i
										class="fas fa-share"></i></button>
								<a class="fb-xfbml-parse-ignore btn btn-primary" target="_blank"
									href="https://www.facebook.com/sharer/sharer.php?u=https://YOUR-SITE-HERE.com">Share
									with facebook</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!-- end single article section -->
		<hr>
	@endisset

	<!-- contact form -->
	@include('front.comm.contact_us')
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
@endsection
