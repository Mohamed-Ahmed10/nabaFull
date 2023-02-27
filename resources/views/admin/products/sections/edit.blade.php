@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    <title>Products</title>
@endsection
<!-- custom page -->
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header">Product Option Edit</h1>
        </div>
        <div class="col-lg-4">
            <div class="breadcrumb_container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin/products/index')}}">Products</a></li>
                    @isset($product_section)
                        <li class="breadcrumb-item"><a href="{{route('admin/products/section/index', $product_section->product_id)}}">Options</a></li>
                    @endisset
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
                    <div class="panel-title pull-left">Product Options Form</div>
                    <div class="pull-right">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#section_ar" data-toggle="tab">Section AR</a></li>
                            <li><a href="#section_en" data-toggle="tab">Section EN</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    @isset($product_section)
                        <form role="form" action="{{url(route('admin/products/section/update', $product_section->id))}}" method="post" enctype="multipart/form-data">
                            <div class="tab-content">
                                @csrf
                                <div class="tab-pane fade in active" id="section_ar">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="title_ar" type="text" class="form-control" placeholder="Title AR" value="{{ $product_section->translate('ar')->title }}">
                                        @error('title_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="description_ar" type="text" class="form-control" placeholder="Description AR" value="{{ $product_section->translate('ar')->description }}">
                                        @error('description_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="icon" type="file" class="form-control" placeholder="Upload Icon">
                                        @error('icon')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <!-- <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="icon" type="text" class="form-control" placeholder="Icon" value="{{ $product_section->icon }}">
                                        @error('icon')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div> -->
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <select class="form-control" name="section_no" id="section_no">
                                            <option value="">Section</option>
                                            <option value="1" <?php if( (int)$product_section->section_no == 1 ){ echo "selected"; } ?> >Section ONE</option>
                                            <option value="2" <?php if( (int)$product_section->section_no == 2 ){ echo "selected"; } ?> >Section TWO</option>
                                        </select>
                                        @error('section_no')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="section_en">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="title_en" type="text" class="form-control" placeholder="Title EN" value="{{ optional($product_section->translate('en'))->title }}">
                                        @error('title_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="description_en" type="text" class="form-control" placeholder="Description EN" value="{{ optional($product_section->translate('en'))->description }}">
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
