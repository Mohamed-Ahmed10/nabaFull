@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    <title>Webinars</title>
@endsection
<!-- custom page -->
@section('css')
@endsection
@section('content')


    <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header">Webinar Edit</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            @include('flash::message')
            <div class="panel tabbed-panel panel-info">
                <div class="panel-heading clearfix">
                    <div class="panel-title pull-left">Webinar Form</div>
                    <div class="pull-right">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#section_ar" data-toggle="tab">Webinar AR</a></li>
                            <li><a href="#section_en" data-toggle="tab">Webinar EN</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    @isset($webinar)
                        <form role="form" action="{{url(route('admin/webinars/update', $webinar->id))}}" method="post" enctype="multipart/form-data">
                            <div class="form-group input-group">
                                <div class="m-2 d-flex">
                                    <img src="{{asset($webinar->image)}}" alt="" class="img-fluid img-50 rounded-circle blur-up lazyloaded" width="100">
                                </div>
                            </div>
                            <div class="tab-content">
                                @csrf
                                <div class="tab-pane fade in active" id="section_ar">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="name_ar" type="text" class="form-control" placeholder="Name AR" value="{{ $webinar->translate('ar')->name }}">
                                        @error('name_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="title_ar" type="text" class="form-control" placeholder="Title AR" value="{{ $webinar->translate('ar')->title }}">
                                        @error('title_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <textarea class="form-control" name="description_ar" placeholder="Description AR" rows="2">{{ $webinar->translate('ar')->description }}</textarea>
                                        @error('description_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="date" type="date" class="form-control" placeholder="Date" value="{{ $webinar->date }}">
                                        @error('date')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="hours" type="text" class="form-control" placeholder="Hours" value="{{ $webinar->hours }}">
                                        @error('hours')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="time_started" type="text" class="form-control" placeholder="Time Started" value="{{ $webinar->time_started }}">
                                        @error('time_started')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="cost" type="number" class="form-control" placeholder="Cost" value="{{ $webinar->cost }}">
                                        @error('cost')
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
                                        <input name="name_en" type="text" class="form-control" placeholder="Name EN" value="{{ optional($webinar->translate('en'))->name }}">
                                        @error('name_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="title_en" type="text" class="form-control" placeholder="Title EN" value="{{ optional($webinar->translate('en'))->title }}">
                                        @error('title_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <textarea class="form-control" name="description_en" placeholder="Description EN" rows="2">{{ optional($webinar->translate('en'))->description }}</textarea>
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
