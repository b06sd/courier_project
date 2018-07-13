@extends('layouts.template')

@section('styles')
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Role Management</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Manage Users</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('flash::message')
             </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Role Management</div>
                        <div class="card-body">
                            <button class="btn btn-info btn-flat pull-right m-t-10" data-toggle="modal"
                                    data-target="#role-modal">Add Role</button>
                            <div class="table-responsive m-t-40">
                                <table class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%" id="roles_table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Role Modal Here -->
    <div id="role-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Role
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="container">

                        {{ Form::open(array('url' => 'roles')) }}
                        <div class="form-group row">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
                        <h5><b>Assign Permissions</b></h5>
                        <div class='form-group row'>
                            @foreach ($permissions as $permission)
                                <div class='col-sm-3'>
                                    {{ Form::checkbox('permissions[]',  $permission->id) }}
                                    {{ Form::label($permission->name, ucfirst($permission->name)) }}
                                </div>
                            @endforeach
                        </div>
                        <div class='form-group row'>
                            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Role Modal -->

    <!-- Edit Role Modal Here -->
    <div id="role-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Role
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="container">

                        {{ Form::open(array('url' => 'roles', 'id' => 'role_form')) }}
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="form-group row">
                            {{ Form::label('role-name', 'Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
                        <h5><b>Assign Permissions</b></h5>
                        <div class='form-group row'>
                            @foreach ($permissions as $permission)
                                <div class='col-sm-3'>

                                    <input class="roles" name="permissions[]" type="checkbox" value="{{ $permission->id
                                    }}">
                                    <label for="Delete Permission">{{ $permission->name }}</label>

                                    {{--{{ Form::checkbox('permissions[]',  $permission->id, '', array('class' =>--}}
                                    {{--'roles')) }}--}}
                                    {{--{{ Form::label($permission->name, ucfirst($permission->name)) }}--}}
                                </div>
                            @endforeach
                        </div>
                        <div class='form-group row'>
                            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Role Modal -->
@endsection

@section('scripts')
    <script src="{{ asset('temp/js/lib/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('temp/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('temp/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('temp/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset('temp/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('temp/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('temp/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('temp/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js') }}"></script>
    {{--    <script src="{{ asset('temp/js/lib/datatables/datatables-init.js }}"></script>--}}

    <script>
        $(document).ready(function () {
            $('#roles_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "processing": true,
                "serverSide": true,
                "language": {
                    "processing": "Processing Request"
                },
                "ajax":{
                    url :"{{ route('allRoles') }}", // json datasource
                    type: "get"
                },
                searchDelay: 350,
                "lengthMenu": [[10, 25, 50, 100, 200, 500], [10, 25, 50, 100, 200, 500]],
                aoColumns: [

                    { data: 'name', name:'name' },
                    { data: 'permissions', name: 'permissions', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            $(document).on('click', '.edit_role', function(ev) {
                ev.preventDefault();
                var val = $(this).data('edit-role');

                $.ajax({
                    url: 'roles/'+val,
                    type: 'GET',
                    beforeSend: function ()
                    {

                    },
                    success: function(response) {
                        //unset all checkbox selected initially
                        $('.roles').prop("checked",false);
                        console.log(response[0].permissions);

                        $('#role_form').find('[name="name"]').val(response[0].name).end();

                        $.each(response[0].permissions , function(index, val) {
                            console.log(val.id);
                            $('input[value="'+ val.id +'"]').prop("checked",true);
                        });

                        $("#role_form").attr("action", "roles/"+response[0].id);
                        $("#role-modal-edit").modal({backdrop: 'static', keyboard: true});
                    },
                    error: function(response) {
                        alert('Operation failed');
                    }
                });
            });

            $(document).on('click', '.del_role', function(ev) {
                ev.preventDefault();
                var val = $(this).data('delete-role');

                var r = confirm("Do you want to delete this role");
                if (r == true) {
                    $.ajax({
                        type: 'post',
                        url: "roles/"+val,
                        data: {
                            '_method': 'DELETE',
                            'id': val
                        },
                        success: function(data) {
                            window.location.href = "{{ route('roles.index') }}";
                        }
                    });
                }
//                $('#company_form').hide();
//                $('#company-modal-edit').modal('show');
            });
        })
    </script>
@endsection
