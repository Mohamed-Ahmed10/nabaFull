@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    <title>Articles</title>
@endsection
<!-- custom page -->
@section('css')
@endsection
@section('content')


    <div class="row">
        <div class="col-lg-8">
        <h1 class="page-header">Article Edit</h1>
        </div>
        <div class="col-lg-4">
            <div class="breadcrumb_container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin/articles/index')}}">Articles</a></li>
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
                    <div class="panel-title pull-left">Article Form</div>
                    <div class="pull-right">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#section_ar" data-toggle="tab">Article AR</a></li>
                            <li><a href="#section_en" data-toggle="tab">Article EN</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    @isset($article)
                        <form role="form" action="{{url(route('admin/articles/update', $article->id))}}" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 text-center">
                                    <img src="{{asset($article->image)}}" alt="" class="img-fluid img-50 rounded-circle blur-up lazyloaded" width="150">
                                </div>
                                <div class="col-lg-6 text-center">
                                    <img src="{{asset($article->second_image)}}" alt="" class="img-fluid img-50 rounded-circle blur-up lazyloaded" width="150">
                                </div>
                            </div>
                            <div class="tab-content">
                                @csrf
                                <div class="tab-pane fade in active" id="section_ar">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="title_ar" type="text" class="form-control" placeholder="Title AR" value="{{ $article->translate('ar')->title }}">
                                        @error('title_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <textarea class="form-control" name="description_ar" placeholder="Description AR" rows="2">{{ $article->translate('ar')->description }}</textarea>
                                        @error('description_ar')
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
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="second_image" type="file" class="form-control" placeholder="Upload Second Image">
                                        @error('second_image')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="section_en">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="title_en" type="text" class="form-control" placeholder="Title EN" value="{{ optional($article->translate('en'))->title }}">
                                        @error('title_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <textarea class="form-control" name="description_en" placeholder="Description EN" rows="2">{{ optional($article->translate('en'))->description }}</textarea>
                                        @error('description_en')
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
