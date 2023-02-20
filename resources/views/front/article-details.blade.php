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
	@include('front.comm.contact_us')
	<!-- end contact form -->
	
@endsection
<!-- custom js -->
@section('script')
@endsection
