@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    <title>Products</title>
@endsection
<!-- custom page -->
@section('css')
    <!-- select 2 -->
    <link href="{{asset('admin/assets/css/select_2.css')}}" rel="stylesheet">
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add New Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            @include('flash::message')
            <div class="panel tabbed-panel panel-info">
                <div class="panel-heading clearfix">
                    <div class="panel-title pull-left">Product Form</div>
                    <div class="pull-right">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#product_ar" data-toggle="tab">Product AR</a></li>
                            <li><a href="#product_en" data-toggle="tab">Product EN</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{url(route('admin/products/create'))}}" method="post" enctype="multipart/form-data">
                        <div class="tab-content">
                            @csrf
                            <div class="tab-pane fade in active" id="product_ar">
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="title_ar" type="text" class="form-control" placeholder="Title AR" value="{{ old('title_ar') }}">
                                    @error('title_ar')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="second_title_ar" type="text" class="form-control" placeholder="Second Title AR" value="{{ old('second_title_ar') }}">
                                    @error('second_title_ar')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="description_ar" type="text" class="form-control" placeholder="Description AR" value="{{ old('description_ar') }}">
                                    @error('description_ar')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="second_description_ar" type="text" class="form-control" placeholder="Second Description AR" value="{{ old('second_description_ar') }}">
                                    @error('second_description_ar')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <!-- <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <select class="form-control" name="category_id" id="categories">
                                        <option value="">Categories</option>
                                    </select>                          
                                    @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> -->
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="video_title_ar" type="text" class="form-control" placeholder="Video Title AR" value="{{ old('video_title_ar') }}">
                                    @error('video_title_ar')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="video_description_ar" type="text" class="form-control" placeholder="Video Description AR" value="{{ old('video_description_ar') }}">
                                    @error('video_description_ar')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="video_link" type="text" class="form-control" placeholder="Video Link" value="{{ old('video_link') }}">
                                    @error('video_link')
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
                            <div class="tab-pane fade" id="product_en">
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="title_en" type="text" class="form-control" placeholder="Title EN" value="{{ old('title_en') }}">
                                    @error('title_en')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="second_title_en" type="text" class="form-control" placeholder="Second Title EN" value="{{ old('second_title_en') }}">
                                    @error('second_title_en')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="description_en" type="text" class="form-control" placeholder="Description EN" value="{{ old('description_en') }}">
                                    @error('description_en')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="second_description_en" type="text" class="form-control" placeholder="Second Description EN" value="{{ old('second_description_en') }}">
                                    @error('second_description_en')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="video_title_en" type="text" class="form-control" placeholder="Video Title EN" value="{{ old('video_title_en') }}">
                                    @error('video_title_en')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="video_description_en" type="text" class="form-control" placeholder="Video Description EN" value="{{ old('video_description_en') }}">
                                    @error('video_description_en')
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
<!-- select 2 -->
<script src="{{asset('admin/assets/js/select_2.js')}}"></script>
<script>
    $('#categories').select2({
        ajax: {
            url: "{{ route('get/categories') }}",
            dataType: 'json',
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.name
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
@endsection