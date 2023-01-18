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
        <div class="col-lg-12">
            <h1 class="page-header">Admins</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Admins Viwes
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6 text-right">
                            <div id="dataTables-example_filter" class="dataTables_filter">
                                <label><input placeholder="search" type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example"></label>
                            </div>
                        </div>
                    </div>
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Activation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($admins)
                                    @foreach($admins as $admin)
                                        <tr class="odd gradeX">
                                            <td>{{$admin->id}}</td>
                                            <td>
                                                <div class="ml-2 d-flex">
                                                    <img src="{{asset($admin->photo)}}" alt="" class="img-fluid img-50 rounded-circle blur-up lazyloaded">
                                                </div>
                                            </td>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td>{{$admin->phone}}</td>
                                            <?php 
                                                if($admin->is_activate == 1){$activate = '<span class="badge badge-info">active</span>';}
                                                else{$activate = '<span class="badge badge-danger">un active</span>';} 
                                            ?>
                                            <td class="center">{!! $activate !!}</td>
                                            <td class="center">
                                                <select class="form-control">
                                                    <option>actions</option>
                                                    <option>
                                                        <button href="" class="openActivationFrom" data-toggle="modal" data-target="#myModalActivation" data-id="{{$admin->id}}">
                                                            activation
                                                        </button>
                                                    </option>
                                                    <option>
                                                        <button href="" class="openDeleteFrom" data-toggle="modal" data-target="#myModalDelete" data-id="{{$admin->id}}">
                                                            delete
                                                        </button>
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                        <div class="modal fade" id="myModalActivation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">activation Confirmation</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="{{url(route('admins/activate'))}}" class="" method="post"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <p>Are You Sure To Update This Record ?</p>
                                            <input id="activation_record_id" name="record_id" type="hidden">
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="submit">Sure</button>
                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabell"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabell">delete Confirmation</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="{{url(route('admins/activate'))}}" class="" method="post"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <p>Are You Sure To Update This Record ?</p>
                                            <input id="delete_record_id" name="record_id" type="hidden">
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="submit">Sure</button>
                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
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
    $(document).on('click', '.openActivationFrom', function() {
        var id = $(this).attr('data-id');
        $('#activation_record_id').val(id);
        $('#myModalActivation').modal('show')
    });
    $(document).on('click', '.openActivationFrom', function() {
        var id = $(this).attr('data-id');
        $('#delete_record_id').val(id);
        $('#myModalDelete').modal('show')
    });
</script>
@endsection