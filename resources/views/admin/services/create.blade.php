@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    <title>Services</title>
@endsection
<!-- custom page -->
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add New Service</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            @include('flash::message')
            <div class="panel tabbed-panel panel-info">
                <div class="panel-heading clearfix">
                    <div class="panel-title pull-left">Service Form</div>
                    <div class="pull-right">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#section_ar" data-toggle="tab">Service AR</a></li>
                            <li><a href="#section_en" data-toggle="tab">Service EN</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{url(route('admin/services/create'))}}" method="post" enctype="multipart/form-data">
                        <div class="tab-content">
                            @csrf
                            <div class="tab-pane fade in active" id="section_ar">
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="title_ar" type="text" class="form-control" placeholder="Title AR" value="{{ old('title_ar') }}">
                                    @error('title_ar')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <textarea class="form-control" name="description_ar" placeholder="Description AR" rows="2">{{ old('description_ar') }}</textarea>
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
                            </div>
                            <div class="tab-pane fade" id="section_en">
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="title_en" type="text" class="form-control" placeholder="Title EN" value="{{ old('title_en') }}">
                                    @error('title_en')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <textarea class="form-control" name="description_en" placeholder="Description EN" rows="2">{{ old('description_en') }}</textarea>
                                    @error('description_en')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit Button</button>
                            <button type="reset" class="btn btn-primary">Reset Button</button>                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-lg-6 -->
    </div>

@endsection
<!-- custom js -->
@section('script')
@endsection