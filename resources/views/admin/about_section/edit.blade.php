@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    <title>About Section</title>
@endsection
<!-- custom page -->
@section('css')
@endsection
@section('content')


    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header">About Section Edit</h1>
        </div>
        <div class="col-lg-4">
            <div class="breadcrumb_container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin/about-section/index')}}">About Section</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
            </div>
        </div> 
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            @include('flash::message')
            <div class="panel tabbed-panel panel-info">
                <div class="panel-heading clearfix">
                    <div class="panel-title pull-left">About Section Form</div>
                    <div class="pull-right">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#section_ar" data-toggle="tab">About Section AR</a></li>
                            <li><a href="#section_en" data-toggle="tab">About Section EN</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    @isset($about_section)
                        <form role="form" action="{{url(route('admin/about-section/update', $about_section->id))}}" method="post" enctype="multipart/form-data">
                            <div class="form-group input-group">
                                <div class="m-2 d-flex">
                                    <img src="{{asset($about_section->image)}}" alt="" class="img-fluid img-50 rounded-circle blur-up lazyloaded" width="100">
                                </div>
                            </div>
                            <div class="tab-content">
                                @csrf
                                <div class="tab-pane fade in active" id="section_ar">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="title_ar" type="text" class="form-control" placeholder="Title AR" value="{{ $about_section->translate('ar')->title }}">
                                        @error('title_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="image" type="file" class="form-control" placeholder="Upload Image">
                                        @error('image')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="section_en">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="title_en" type="text" class="form-control" placeholder="Title EN" value="{{ optional($about_section->translate('en'))->title }}">
                                        @error('title_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Submit Button</button>
                            </div>
                        </form>
                    @endisset
                </div>
            </div>
        </div>
        <!-- /.col-lg-6 -->
    </div>

@endsection
<!-- custom js -->
@section('script')
@endsection