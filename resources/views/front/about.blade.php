@extends('layouts.front.home')

<!-- title page -->
@section('title')
<title>About | Naba soft company</title>
@endsection
<!-- custom page -->
@section('css')
@endsection
@section('content')


<!-- Content Goes here -->

<div class="mt-150 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>About <span class="orange-text"> us</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                        beatae optio.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-50 pt-5 vision">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>Our <span class="orange-text">vision</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                        beatae optio.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-50 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>Our <span class="orange-text">mission</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                        beatae optio.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-50 pt-5 important_clients">
    <div class="container">
        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">
                <h3>Our <span class="orange-text">clients</span></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-team-item">
                    <div class="team-bg team-bg-1">
                        <img src="{{asset('front/assets/img/naba_logo.jpeg')}}">
                    </div>
                    <h4>Client <span>description description description</span></h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-team-item">
                    <div class="team-bg team-bg-2">
                        <img src="{{asset('front/assets/img/naba_logo.jpeg')}}">
                    </div>
                    <h4>Client <span>description description description</span></h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                <div class="single-team-item">
                    <div class="team-bg team-bg-3">
                        <img src="{{asset('front/assets/img/naba_logo.jpeg')}}">
                    </div>
                    <h4>Client <span>description description description</span></h4>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

<!-- custom js -->
@section('script')
<script>
</script>
@endsection
