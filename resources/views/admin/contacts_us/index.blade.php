@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    <title>Contacts Us</title>
@endsection
<!-- custom page -->
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header">Contacts Us</h1>
        </div>
        <div class="col-lg-4">
            <div class="breadcrumb_container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin/contact-us/index')}}">Contacts Us</a></li>
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
                    Contacts Us Viwes
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @include('flash::message')
                    <div class="row" style="padding-bottom:20px">
                        <div class="col-sm-10">
                            <form onsubmit="event.preventDefault()" class="expert_search">
                                <div class="tab-content">
                                    @csrf
                                    <div class="col-xs-3">
                                        <div id="dataTables-example_filter" class="dataTables_filter">
                                            SECTION
                                            <select id="section_input" class="form-control" name="section" aria-controls="dataTables-example">
                                                <option value="">all</option>
                                                <option value="6">Home Concats</option>
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
                                            FROM
                                            <input id="date_from_input" name="date_from" type="date" class="form-control input-sm" aria-controls="dataTables-example">
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div id="dataTables-example_filter" class="dataTables_filter">
                                            TO
                                            <input id="date_to_input" name="date_to" type="date" class="form-control input-sm" aria-controls="dataTables-example">
                                        </div>
                                    </div>
                                        <div class="col-xs-3" style="margin-top:20px">
                                        <button type="button" id="export_excel_button" class="btn btn-success btn-sm">Excel</button>
                                            <button type="submit"  class="btn btn-success btn-sm">Submit</button>
                                            <a href="{{route('admin/contact-us/index')}}" class="btn btn-primary btn-sm">Reset</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-2 text-right"style="margin-top:20px">
                            <div id="dataTables-example_filter" class="dataTables_filter">
                                <label><input id="data_search" placeholder="search" type="search" class="form-control input-sm" aria-controls="dataTables-example"></label>
                            </div>
                        </div>
                    </div>
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            @csrf
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Section</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>Company Name</th>
                                    <th>Notices</th>
                                </tr>
                            </thead>
                            <tbody id="tableShowData">
                                @isset($contacts_us)
                                    @foreach($contacts_us as $contact)
                                        <tr class="odd gradeX">
                                            <?php
                                                $section_no = '( --- )';
                                                if($contact->section_no == 1 && !empty($contact->sectionable) ){ $section_no = 'products ( ' . $contact->sectionable->title .' )'  ; }
                                                elseif($contact->section_no == 2 && !empty($contact->sectionable) ){ $section_no = 'articles ( ' . $contact->sectionable->title .' )'  ; }
                                                elseif($contact->section_no == 3 && !empty($contact->sectionable) ){ $section_no = 'webinars ( ' . $contact->sectionable->title .' )'  ; }
                                                elseif($contact->section_no == 4 && !empty($contact->sectionable) ){ $section_no = 'services ( ' . $contact->sectionable->title .' )'  ; }
                                                elseif($contact->section_no == 5 && !empty($contact->sectionable) ){ $section_no = 'trainings ( ' . $contact->sectionable->name .' )'  ; }
                                            ?>
                                            <td>{{$contact->id}}</td>
                                            <td>{{$section_no}}</td>
                                            <td>{{$contact->name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->phone}}</td>
                                            <td>{{$contact->country}}</td>
                                            <td>{{$contact->company_name}}</td>
                                            <td>{{$contact->notes}}</td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                        <div style="margin-top: 20px; font-weight: 600; font-size: 16px;">
                            Showing 1 to <span id="showItems"></span> of <span>{{App\Models\ContactUs::count()}}</span> entries
                        </div>
                        <div class="ltn__pagination-area text-center mt-5">
                            <div class="ltn__pagination text-center">
                                <div id="load_more">
                                    <button type="button" name="load_more_button" style="width: 350px;" class="btn btn-info form-control px-5" data-id="'.$last_id.'" id="load_more_button">عرض المزيد</button>
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
        let dataLen = @json($contacts_us);
        let showItems = document.getElementById("showItems");
        showItems.innerHTML = dataLen.data.length
        let length = dataLen.data.length

        $(document).ready(function() {
            $(document).on('click', '#load_more_button', function() {
                let records = ``
                var _token = $('input[name="_token"]').val();
                var id = $(this).attr('data-id');
                let lastId = ''
                let section_no = ''
                $('#load_more_button').html('<b>Loading... </b>');
                load_data(id, _token);

                function load_data(id = "", _token) {
                    $.ajax({
                        url: "{{ route('admin/contact-us/getMore') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token,
                        },
                        success: function(data) {
                            if (data.length > 0) {
                                for (let i = 0; i < data.length; i++) {
                                    section_no = ''

                                    if (data[i].section_no == 1) { section_no = 'products' }
                                    else if (data[i].section_no == 2) { section_no = 'articles' }
                                    else if (data[i].section_no == 3) { section_no = 'webinars' }
                                    else if (data[i].section_no == 4) { section_no = 'services' }
                                    else if (data[i].section_no == 5) { section_no = 'trainings' }

                                    if(typeof(data[i].sectionable) == 'undefined' || data[i].sectionable == null){
                                        section_no = '( --- )'
                                    }else{
                                        if (data[i].section_no == 5) {
                                            section_no = section_no + ' ( ' + data[i].sectionable.name + ' )'
                                        }else{
                                            section_no = section_no + ' ( ' + data[i].sectionable.title + ' )'
                                        }
                                    }
                                    lastId = data[i].id
                                    records += `
                                        <tr>
                                            <td>${data[i].id}</td>
                                            <td>${section_no}</td>
                                            <td>${data[i].name}</td>
                                            <td>${data[i].email}</td>
                                            <td>${data[i].phone}</td>
                                            <td>${data[i].country}</td>
                                            <td>${data[i].company_name}</td>
                                            <td>${data[i].notes}</td>
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
            let section_no = ''
            event.preventDefault();
            $.ajax({
                url: "{{ route('admin/contact-us/search') }}",
                method: "POST",
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) {
                    if (data.length > 0) {
                        for (let i = 0; i < data.length; i++) {
                            section_no = ''

                            if (data[i].section_no == 1) { section_no = 'products' }
                            else if (data[i].section_no == 2) { section_no = 'articles' }
                            else if (data[i].section_no == 3) { section_no = 'webinars' }
                            else if (data[i].section_no == 4) { section_no = 'services' }
                            else if (data[i].section_no == 5) { section_no = 'trainings' }

                            if(typeof(data[i].sectionable) == 'undefined' || data[i].sectionable == null){
                                section_no = '( --- )'
                            }else{
                                if (data[i].section_no == 5) {
                                    section_no = section_no + ' ( ' + data[i].sectionable.name + ' )'
                                }else{
                                    section_no = section_no + ' ( ' + data[i].sectionable.title + ' )'
                                }
                            }
                            records += `
                                <tr>
                                    <td>${data[i].id}</td>
                                    <td>${section_no}</td>
                                    <td>${data[i].name}</td>
                                    <td>${data[i].email}</td>
                                    <td>${data[i].phone}</td>
                                    <td>${data[i].country}</td>
                                    <td>${data[i].company_name}</td>
                                    <td>${data[i].notes}</td>
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
    <script>
        $('.expert_search').on('submit', function(event){
            var _token = $('input[name="_token"]').val();
            let section_no = ''
            let records = ``
            event.preventDefault();
            $.ajax({
                url:"{{ route('admin/contact-us/form/search') }}",
                method:"POST",
                data: new FormData(this),
                contentType: false,
                cache:false,
                processData: false,
                dataType:"json",
                success:function(data){
                    if (data.length > 0) {
                        for (let i = 0; i < data.length; i++) {
                            section_no = ''

                            if (data[i].section_no == 1) { section_no = 'products' }
                            else if (data[i].section_no == 2) { section_no = 'articles' }
                            else if (data[i].section_no == 3) { section_no = 'webinars' }
                            else if (data[i].section_no == 4) { section_no = 'services' }
                            else if (data[i].section_no == 5) { section_no = 'trainings' }

                            if(typeof(data[i].sectionable_name) == 'undefined'){
                            }else{
                                section_no = section_no + ' ( ' + data[i].sectionable_name + ' )'
                            }
                            records += `
                                <tr>
                                    <td>${data[i].id}</td>
                                    <td>${section_no}</td>
                                    <td>${data[i].name}</td>
                                    <td>${data[i].email}</td>
                                    <td>${data[i].phone}</td>
                                    <td>${data[i].country}</td>
                                    <td>${data[i].company_name}</td>
                                    <td>${data[i].notes}</td>
                                </tr>
                            `
                        }
                        document.getElementById("tableShowData").style.display = null
                        document.getElementById("tableShowData").innerHTML = records
                        length = data.length
                        showItems.innerHTML = Number(length)
                    } else if (data.length === 0) {
                        length = data.length
                        showItems.innerHTML = Number(length)
                        document.getElementById("tableShowData").style.display = 'none'
                    }
                }
            })
        });

        $('#export_excel_button').on('click',function(){
            var query = {
                section: $('#section_input').val(),
                date_from: $('#date_from_input').val(),
                date_to: $('#date_to_input').val()
            }
            var url = "{{URL::to('admin/contact-us/export/excel')}}?" + $.param(query)
            window.open(url, '_blank');
        });

    </script>
@endsection
