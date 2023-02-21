@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    <title>Trainings</title>
@endsection
<!-- custom page -->
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header">Add New Training</h1>
        </div>
        <div class="col-lg-4">
            <div class="breadcrumb_container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin/trainings/index')}}">Trainings</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
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
                    <div class="panel-title pull-left">Training Form</div>
                    <div class="pull-right">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#section_ar" data-toggle="tab">Training AR</a></li>
                            <li><a href="#section_en" data-toggle="tab">Training EN</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{url(route('admin/trainings/create'))}}" method="post" enctype="multipart/form-data">
                        <div class="tab-content">
                            @csrf
                            <div class="tab-pane fade in active" id="section_ar">
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="name_ar" type="text" class="form-control" placeholder="Name AR" value="{{ old('name_ar') }}">
                                    @error('name_ar')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <!-- <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="title_ar" type="text" class="form-control" placeholder="Title AR" value="{{ old('title_ar') }}">
                                    @error('title_ar')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> -->
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <textarea class="form-control" name="description_ar" placeholder="Description AR" rows="2">{{ old('description_ar') }}</textarea>
                                    @error('description_ar')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="instructor" type="text" class="form-control" placeholder="Instructor" value="{{ old('instructor') }}">
                                    @error('instructor')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="date_from" type="date" class="form-control" placeholder="Date From" value="{{ old('date_from') }}">
                                    @error('date_from')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="date_to" type="date" class="form-control" placeholder="Date To" value="{{ old('date_to') }}">
                                    @error('date_to')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="days" type="text" class="form-control" placeholder="Days" value="{{ old('days') }}">
                                    @error('days')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="time_started" type="text" class="form-control" placeholder="Time Started" value="{{ old('time_started') }}">
                                    @error('time_started')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="cost" type="number" class="form-control" placeholder="Cost" value="{{ old('cost') }}">
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
                                    <input name="name_en" type="text" class="form-control" placeholder="Name EN" value="{{ old('name_en') }}">
                                    @error('name_en')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <!-- <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="title_en" type="text" class="form-control" placeholder="Title EN" value="{{ old('title_en') }}">
                                    @error('title_en')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> -->
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