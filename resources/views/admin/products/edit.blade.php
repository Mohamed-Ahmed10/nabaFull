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
            <h1 class="page-header">Product Edit</h1>
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
                    @isset($product)
                        <form role="form" action="{{url(route('admin/products/update', $product->id))}}" method="post" enctype="multipart/form-data">
                            <div class="tab-content">
                                @csrf
                                <div class="tab-pane fade in active" id="product_ar">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="title_ar" type="text" class="form-control" placeholder="Title AR" value="{{ $product->translate('ar')->title }}">
                                        @error('title_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="description_ar" type="text" class="form-control" placeholder="Description AR" value="{{ $product->translate('ar')->description }}">
                                        @error('description_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="second_description_ar" type="text" class="form-control" placeholder="Second Description AR" value="{{ $product->translate('ar')->second_description }}">
                                        @error('second_description_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <select class="form-control" name="category_id" id="categories">
                                            <?php 
                                                if($product->category_id > 0){
                                                    echo '<option value="'. $product->category_id .'" selected>'. optional($product->category)->name .'</option>';
                                                }
                                            ?>
                                            <option value="">Categories</option>
                                        </select>                          
                                        @error('category_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="video_title_ar" type="text" class="form-control" placeholder="Video Title AR" value="{{ $product->translate('ar')->video_title_ar }}">
                                        @error('video_title_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="video_description_ar" type="text" class="form-control" placeholder="Video Description AR" value="{{ $product->translate('ar')->video_description_ar }}">
                                        @error('video_description_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="video_link" type="text" class="form-control" placeholder="Video Link" value="{{ $product->video_link }}">
                                        @error('video_link')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product_en">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="title_en" type="text" class="form-control" placeholder="Title EN" value="{{ optional($product->translate('en'))->title }}">
                                        @error('title_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="description_en" type="text" class="form-control" placeholder="Description EN" value="{{ optional($product->translate('en'))->description }}">
                                        @error('description_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="second_description_en" type="text" class="form-control" placeholder="Second Description EN" value="{{ optional($product->translate('en'))->second_description }}">
                                        @error('second_description_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="video_title_en" type="text" class="form-control" placeholder="Video Title EN" value="{{ optional($product->translate('en'))->video_title_en }}">
                                        @error('video_title_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon" style="color: red;">*</span>
                                        <input name="video_description_en" type="text" class="form-control" placeholder="Video Description EN" value="{{ optional($product->translate('en'))->video_description_en }}">
                                        @error('video_description_en')
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