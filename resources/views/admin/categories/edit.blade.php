@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    <title>Categories</title>
@endsection
<!-- custom page -->
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category Edit</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            @include('flash::message')
            <div class="panel tabbed-panel panel-info">
                <div class="panel-heading clearfix">
                    <div class="panel-title pull-left">Category Form</div>
                    <div class="pull-right">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#category_ar" data-toggle="tab">Category AR</a></li>
                            <li><a href="#category_en" data-toggle="tab">Category EN</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    @isset($category)
                        <form role="form" action="{{url(route('admin/categories/update', $category->id))}}" method="post" enctype="multipart/form-data">
                            <div class="tab-content">
                                @csrf
                                <div class="tab-pane fade in active" id="category_ar">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="name_ar" type="text" class="form-control" placeholder="Name AR" value="{{ $category->translate('ar')->name }}">
                                        @error('name_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="category_en">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="name_en" type="text" class="form-control" placeholder="Name EN" value="{{ optional($category->translate('en'))->name }}">
                                        @error('name_en')
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