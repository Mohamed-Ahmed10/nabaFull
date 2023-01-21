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
        <div class="col-lg-12">
            <h1 class="page-header">Add New Article</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Article Form
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-9">
                            <form role="form" action="{{url(route('admin/articles/create'))}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('flash::message')
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="title" type="text" class="form-control" placeholder="Title" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <!-- <input name="description" type="text" class="form-control" placeholder="Description" value="{{ old('description') }}"> -->
                                    <textarea class="form-control" name="description" placeholder="Description" rows="2">{{ old('description') }}</textarea>
                                    @error('description')
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
                                <button type="submit" class="btn btn-success">Submit Button</button>
                                <button type="reset" class="btn btn-primary">Reset Button</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

@endsection
<!-- custom js -->
@section('script')
@endsection