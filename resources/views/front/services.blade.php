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
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb-text">
						<h1>Naba Services</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-5 mb-150">
		<div class="container">
			<div class="row">
				@isset($services)
					@foreach($services as $service)
						<div class="col-lg-4 col-md-6 p-2">
							<!-- TODO:This will be the link of service   -->
							<div class="single-latest-product">
								<div class="latest-news-bg news-bg-1"></div>
								<div class="news-text-box">
									<h4 class="text-center"><a href="{{route('front/service', $service->id)}}"> <br> {{$service->title}}</a></h4>
									<img src="{{asset($service->image)}}" alt="sample">
									<p class="mt-2 article_content">{{$service->description}}</p>
									<a href="{{route('front/service', $service->id)}}" class="read-more-btn" target="_blank">read more <i class="fas fa-angle-right"></i></a>
								</div>
							</div>
						</div>
					@endforeach
				@endisset
			</div>
		</div>
	</div>
	<!-- end latest news -->

@endsection
<!-- custom js -->
@section('script')
<script>
	$('#services_active').addClass('current-list-item');
</script>
@endsection
