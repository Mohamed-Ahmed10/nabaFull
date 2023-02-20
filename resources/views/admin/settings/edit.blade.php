@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    <title>Settings</title>
@endsection
<!-- custom page -->
@section('css')
@endsection
@section('content')


    <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header">Setting Edit</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            @include('flash::message')
            <div class="panel tabbed-panel panel-info">
                <div class="panel-heading clearfix">
                    <div class="panel-title pull-left">Setting Form</div>
                    <div class="pull-right">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#section_ar" data-toggle="tab">Setting AR</a></li>
                            <li><a href="#section_en" data-toggle="tab">Setting EN</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    @isset($setting)
                        <form role="form" action="{{url(route('admin/settings/update', $setting->id))}}" method="post" enctype="multipart/form-data">
                            <div class="form-group input-group">
                                <div class="m-2 d-flex">
                                    <img src="{{asset($setting->image)}}" alt="" class="img-fluid img-50 rounded-circle blur-up lazyloaded">
                                </div>
                            </div>
                            <div class="tab-content">
                                @csrf
                                <div class="tab-pane fade in active" id="section_ar">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="title_ar" type="text" class="form-control" placeholder="Title AR" value="{{ $setting->translate('ar')->title }}">
                                        @error('title_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <textarea class="form-control" name="second_title_ar" placeholder="Second Title AR" rows="2">{{ $setting->translate('ar')->second_title }}</textarea>
                                        @error('second_title_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="video_link" type="text" class="form-control" placeholder="Video Link" value="{{ $setting->video_link }}">
                                        @error('video_link')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <!-- <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="color_icon" type="color" id="favcolor" class="form-control" placeholder="Icon Color" value="{{ $setting->color_icon }}">
                                        @error('color_icon')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div> -->
                                </div>
                                <div class="tab-pane fade" id="section_en">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="title_en" type="text" class="form-control" placeholder="Title EN" value="{{ optional($setting->translate('en'))->title }}">
                                        @error('title_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <textarea class="form-control" name="second_title_en" placeholder="Second Title EN" rows="2">{{ optional($setting->translate('en'))->second_title }}</textarea>
                                        @error('second_title_en')
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