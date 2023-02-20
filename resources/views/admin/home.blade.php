@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    <title>DashBoard</title>
@endsection
<!-- custom page -->
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-header">Naba dashboard</h1>
            <img src="{{asset('front/assets/img/naba_logo.jpeg')}}" >
        </div>
        <!-- /.col-lg-12 -->

@endsection
<!-- custom js -->
@section('script')
    <!-- Morris Charts JavaScript -->
    <script src="{{asset('admin/assets/js/raphael.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/morris.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/morris-data.js')}}"></script>
@endsection
