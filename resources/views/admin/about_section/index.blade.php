@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    <title>About Section</title>
@endsection
<!-- custom page -->
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header">About Section</h1>
        </div>
        <div class="col-lg-4">
            <div class="breadcrumb_container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin/about-section/index')}}">About Section</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Index</li>
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
                    About Section Viwes
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @include('flash::message')
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6 text-right">
                            <div id="dataTables-example_filter" class="dataTables_filter">
                                <label><input id="data_search" placeholder="search" type="search" class="form-control input-sm" aria-controls="dataTables-example"></label>
                            </div>
                        </div>
                    </div>
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Activation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tableShowData">
                                @isset($about_section)
                                    @foreach($about_section as $about)
                                        <tr class="odd gradeX">
                                            <td>{{$about->id}}</td>
                                            <td>
                                                <div class="ml-2 d-flex">
                                                    <img src="{{asset($about->image)}}" alt="" class="img-fluid img-50 rounded-circle blur-up lazyloaded" width="100">
                                                </div>
                                            </td>
                                            <td>{{ $about->title }}</td>
                                            <?php
                                                if($about->is_activate == 1){$activate = '<span class="badge badge-info">active</span>';}
                                                else{$activate = '<span class="badge badge-danger">un active</span>';}
                                            ?>
                                            <td class="center">{!! $activate !!}</td>
                                            <td class="center">
                                                <ul class="nav navbar-center navbar-top-links" style="border-radius: 15px;">
                                                    <li class="dropdown">
                                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                            <i class="fa-align-justify"></i> actions <b class="caret"></b>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-user">
                                                            <li>
                                                                <a href="{{route('admin/about-section/edit', $about->id)}}" style="text-decoration: none; color: white; width: 64px;margin:auto" class="btn btn-success">
                                                                    edit
                                                                </a>
                                                            </li>
                                                            <li class="divider"></li>
                                                            <li >
                                                                <button class="dropdown-item btn btn-danger openDeleteFrom" data-toggle="modal" data-target="#myModalDelete" data-id="{{$about->id}}">
                                                                    delete
                                                                </button>
                                                            </li>
                                                            <li class="divider"></li>
                                                            <li>
                                                                <button class="dropdown-item btn btn-priamry openActivationFrom" data-toggle="modal" data-target="#myModalActivation" data-id="{{$about->id}}">
                                                                    activation
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                        <div style="margin-top: 20px; font-weight: 600; font-size: 16px;">
                            Showing 1 to <span id="showItems"></span> of <span>{{App\Models\AboutSection::count()}}</span> entries
                        </div>
                        <div class="ltn__pagination-area text-center mt-5">
                            <div class="ltn__pagination text-center">
                                <div id="load_more">
                                    <button type="button" name="load_more_button" style="width: 350px;" class="btn btn-info form-control px-5" data-id="'.$last_id.'" id="load_more_button">عرض المزيد</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabell"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title f-w-600" id="exampleModalLabell">Delete Confirmation</h5>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="{{url(route('admin/about-section/delete'))}}" method="get">
                                        {{ csrf_field() }}
                                        <p>Are You Sure To Update This Record ?</p>
                                        <input id="delete_record_id" name="record_id" type="hidden">
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">Sure</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="myModalActivation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Activation Confirmation</h5>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="{{url(route('admin/about-section/activate'))}}" method="get">
                                        {{ csrf_field() }}
                                        <p>Are You Sure To Update This Record ?</p>
                                        <input id="activation_record_id" name="record_id" type="hidden">
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">Sure</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script>
        $(document).on('click', '.openDeleteFrom', function() {
            var id = $(this).attr('data-id');
            $('#delete_record_id').val(id);
        });
        $(document).on('click', '.openActivationFrom', function() {
            var id = $(this).attr('data-id');
            $('#activation_record_id').val(id);
        });
    </script>
    <script>
        let dataLen = @json($about_section);
        let showItems = document.getElementById("showItems");
        showItems.innerHTML = dataLen.data.length
        let length = dataLen.data.length

        $(document).ready(function() {
            $(document).on('click', '#load_more_button', function() {
                let records = ``
                var _token = $('input[name="_token"]').val();
                var id = $(this).attr('data-id');
                let lastId = ''
                $('#load_more_button').html('<b>Loading... </b>');
                load_data(id, _token);

                function load_data(id = "", _token) {
                    $.ajax({
                        url: "{{ route('admin/about-section/getMore') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token,
                        },
                        success: function(data) {
                            if (data.length > 0) {
                                for (let i = 0; i < data.length; i++) {
                                    lastId = data[i].id
                                    image_path =  "{{ asset('') }}" + data[i].image;
                                    edit_route =  "{{ route('admin/about-section/edit') }}" + '/' + data[i].id;
                                    records += `
                                        <tr>
                                            <td>${data[i].id}</td>
                                            <td>
                                                <div class="ml-2 d-flex">
                                                    <img src="${image_path}" alt="" class="img-fluid img-50 rounded-circle blur-up lazyloaded">
                                                </div>
                                            </td>
                                            <td>${data[i].title}</td>
                                            <td>${data[i].is_activate == 1 ? '<span class="badge badge-info">active</span>' : '<span class="badge badge-danger">un active</span>'}</td>
                                            <td>
                                                <ul class="nav navbar-center navbar-top-links" style="border-radius: 15px;">
                                                    <li class="dropdown">
                                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                            <i class="fa-align-justify"></i> actions <b class="caret"></b>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-user">
                                                            <li>
                                                                <a href="${edit_route}" style="text-decoration: none; color: white; width: 64px;margin:auto" class="btn btn-success">
                                                                    edit
                                                                </a>
                                                            </li>
                                                            <li class="divider"></li>
                                                            <li >
                                                                <button class="dropdown-item btn btn-danger openDeleteFrom" data-toggle="modal" data-target="#myModalDelete" data-id="${data[i].id}">
                                                                    delete
                                                                </button>
                                                            </li>
                                                            <li class="divider"></li>
                                                            <li>
                                                                <button class="dropdown-item btn btn-priamry openActivationFrom" data-toggle="modal" data-target="#myModalActivation" data-id="${data[i].id}">
                                                                    activation
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    `
                                }
                                document.getElementById("tableShowData").innerHTML += records
                                length += data.length
                                showItems.innerHTML = Number(length)
                                let btnData = `<button type="button" name="load_more_button" style="width: 350px;" class="btn btn-info form-control px-5" data-id=${length} id="load_more_button">عرض المزيد</button>`
                                $('#load_more_button').remove();
                                document.getElementById("load_more").innerHTML = btnData
                            } else if (data.length === 0) {
                                let btnNoData = `<button type="button" name="load_more_button" style="width: 350px;" class="btn btn-primary form-control px-5" id="load_more_button_remove">No Data</button>`
                                $('#load_more_button').remove();
                                document.getElementById("load_more").innerHTML = btnNoData
                            }
                        }
                    })
                }
            });
        });

        $(document).on('keyup', '#data_search', function() {
            var query = $(this).val();
            var _token = $('input[name="_token"]').val();
            let records = ``
            event.preventDefault();
            $.ajax({
                url: "{{ route('admin/about-section/search') }}",
                method: "POST",
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) {
                    if (data.length > 0) {
                        for (let i = 0; i < data.length; i++) {
                            image_path =  "{{ asset('') }}" + data[i].image;
                            edit_route =  "{{ route('admin/about-section/edit') }}" + '/' + data[i].id;
                            records += `
                                <tr>
                                    <td>${data[i].id}</td>
                                    <td>
                                        <div class="ml-2 d-flex">
                                            <img src="${image_path}" alt="" class="img-fluid img-50 rounded-circle blur-up lazyloaded">
                                        </div>
                                    </td>
                                    <td>${data[i].title}</td>
                                    <td>${data[i].is_activate == 1 ? '<span class="badge badge-info">active</span>' : '<span class="badge badge-danger">un active</span>'}</td>
                                    <td>
                                        <ul class="nav navbar-center navbar-top-links" style="border-radius: 15px;">
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                    <i class="fa-align-justify"></i> actions <b class="caret"></b>
                                                </a>
                                                <ul class="dropdown-menu dropdown-user">
                                                    <li>
                                                        <a href="${edit_route}" style="text-decoration: none; color: white; width: 64px;margin:auto" class="btn btn-success">
                                                            edit
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <button class="dropdown-item btn btn-danger openDeleteFrom" data-toggle="modal" data-target="#myModalDelete" data-id="${data[i].id}">
                                                            delete
                                                        </button>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <button class="dropdown-item btn btn-priamry openActivationFrom" data-toggle="modal" data-target="#myModalActivation" data-id="${data[i].id}">
                                                            activation
                                                        </button>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            `
                        }
                        document.getElementById("tableShowData").style.display = null
                        document.getElementById("tableShowData").innerHTML = records
                        $('#load_more_button').remove();
                        $('#load_more_button_remove').remove();
                        length = data.length
                        showItems.innerHTML = Number(length)
                        if (data[0].searchButton == 1) {
                            let btnData = `<button type="button" name="load_more_button" style="width: 350px;" class="btn btn-info form-control px-5" data-id=${length} id="load_more_button">عرض المزيد</button>`
                            document.getElementById("load_more").innerHTML = btnData
                        }
                    } else if (data.length === 0) {
                        length = data.length
                        showItems.innerHTML = Number(length)
                        document.getElementById("tableShowData").style.display = 'none'
                        let btnNoData = `<button type="button" name="load_more_button" style="width: 350px;" class="btn btn-primary form-control px-5" id="load_more_button_remove">No Data</button>`
                        document.getElementById("load_more").innerHTML = btnNoData
                    }
                }
            })
        });
    </script>
@endsection
