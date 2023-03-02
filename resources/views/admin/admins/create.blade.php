@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    <title>Admins</title>
@endsection
<!-- custom page -->
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header">Add New Admin</h1>
        </div>
        <div class="col-lg-4">
            <div class="breadcrumb_container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admins/index')}}">Admins</a></li>
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    Admin Form
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-9">
                            <form role="form" action="{{url(route('admins/create'))}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('flash::message')
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="name" type="text" class="form-control" placeholder="Username">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="email" type="email" class="form-control" placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="phone" type="text" class="form-control" placeholder="Phone">
                                    @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <input name="role_id" type="hidden" class="form-control" placeholder="Phone" value="1">
                                <!-- <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    @error('role_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> -->
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="password" type="password" class="form-control" placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;">*</span>
                                    <input name="password_confirmation" type="password" class="form-control" placeholder="Password Confirmation">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="color: red;"></span>
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