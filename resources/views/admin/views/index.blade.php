@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    <title>Views</title>
@endsection
<!-- custom page -->
@section('css')
    <!-- select 2 -->
    <link href="{{asset('admin/assets/css/select_2.css')}}" rel="stylesheet">
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header">Views</h1>
        </div>
        <div class="col-lg-4">
            <div class="breadcrumb_container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin/views/index')}}">Views</a></li>
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
                    Views
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @include('flash::message')
                    <div class="container-fluid">
                    <div class="row">
                        <form onsubmit="event.preventDefault()" class="expert_search">
                            <div class="tab-content">
                                @csrf
                                <div class="col-xs-3">
                                    <div id="dataTables-example_filter" class="dataTables_filter">
                                        <select class="form-control" name="country_name" id="countries" aria-controls="dataTables-example">
                                            <option value="">Countries</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div id="dataTables-example_filter" class="dataTables_filter">
                                        <select class="form-control" name="section" aria-controls="dataTables-example">
                                            <option value="">Sections</option>
                                            <option value="1">Products</option>
                                            <option value="2">Articles</option>
                                            <option value="3">Webinars</option>
                                            <option value="4">Services</option>
                                            <option value="5">Trainings</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div id="dataTables-example_filter" class="dataTables_filter">
                                        <input  name="date_from" type="date" class="form-control input-sm" aria-controls="dataTables-example">
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div id="dataTables-example_filter" class="dataTables_filter">
                                        <input  name="date_to" type="date" class="form-control input-sm" aria-controls="dataTables-example">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xs-2">
                                    <div class="checkbox">
                                        <input name="peak_time" type="checkbox" value="1">PeakTime
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="checkbox">
                                        <input name="countries" type="checkbox" value="1">Countries
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="checkbox">
                                        <input name="pages" type="checkbox" value="1">Pages
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="checkbox">
                                        <input name="setions_items_rep" type="checkbox" value="1">Setion Items
                                    </div>
                                </div>
                                <div class="col-xs-2" style="margin-top: 8px;">
                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                </div>
                                <div class="col-xs-2" style="margin-top: 8px;">
                                <a href="{{route('admin/views/index')}}" class="btn btn-primary btn-sm">Reset</a>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <br/>
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            @csrf
                            <thead>
                                <tr>
                                    <th>Section</th>
                                    <th>Country</th>
                                    <th>Time</th>
                                    <th>Views</th>
                                </tr>
                            </thead>
                            <tbody id="tableShowData">

                            </tbody>
                        </table>
                        <!-- <div style="margin-top: 20px; font-weight: 600; font-size: 16px;">
                            Showing 1 to <span id="showItems"></span> of <span>{{App\Models\View::count()}}</span> entries
                        </div> -->
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
<!-- select 2 -->
    <script src="{{asset('admin/assets/js/select_2.js')}}"></script>
    <script>
        $('#countries').select2({
            ajax: {
                url: "{{ route('get/views/countries') }}",
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                id: item.country_name,
                                text: item.country_name
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
    <script>
        // let dataLen = @json($views);
        // let showItems = document.getElementById("showItems");
        // showItems.innerHTML = dataLen.length
        // let length = dataLen.length

        $('.expert_search').on('submit', function(event){
            console.log("aaaa");
            var _token = $('input[name="_token"]').val();
            let hour = ''
            let section_no = ''
            let country_name = ''
            let records = ``
            event.preventDefault();
            $.ajax({
                url:"{{ route('admin/views/search') }}",
                method:"POST",
                data: new FormData(this),
                contentType: false,
                cache:false,
                processData: false,
                dataType:"json",
                success:function(data){
                    if (data.length > 0) {

                        for (let i = 0; i < data.length; i++) {
                            hour = ''
                            section_no = ''

                            if (typeof(data[i].country_name) == 'undefined') {
                                country_name = ''
                            }else{
                                country_name = data[i].country_name
                            }

                            if (data[i].section_no == 1) { section_no = 'products' }
                            else if (data[i].section_no == 2) { section_no = 'articles' }
                            else if (data[i].section_no == 3) { section_no = 'webinars' }
                            else if (data[i].section_no == 4) { section_no = 'services' }
                            else if (data[i].section_no == 5) { section_no = 'trainings' }

                            if (data[i].hour == 1) { hour = 'صباحا بعد منتصف الليل' }
                            else if (data[i].hour == 2) { hour = 'صباحا قبل الظهر' }
                            else if (data[i].hour == 3) { hour = 'مساء بعد الظهر' }
                            else if (data[i].hour == 4) { hour = 'مساء بعد الخامسه ليلا' }

                            if(typeof(data[i].viewable_name) == 'undefined'){
                            }else{
                                section_no = section_no + ' ( ' + data[i].viewable_name + ' )'
                            }
                            records += `
                                <tr>
                                    <td>${section_no}</td>
                                    <td>${country_name}</td>
                                    <td>${hour}</td>
                                    <td>${data[i].count_ids}</td>
                                </tr>
                            `
                        }
                        document.getElementById("tableShowData").style.display = null
                        document.getElementById("tableShowData").innerHTML = records
                        // length = data.length
                        // showItems.innerHTML = Number(length)
                    } else if (data.length === 0) {
                        // length = data.length
                        // showItems.innerHTML = Number(length)
                        document.getElementById("tableShowData").style.display = 'none'
                    }
                }
            })
        });
    </script>
@endsection
