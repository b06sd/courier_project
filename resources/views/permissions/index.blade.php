@extends('layouts.template')

@section('styles')
@endsection

@section('content')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">User Management</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Manage Permission</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </div>
  </div>
  <!-- End Bread crumb -->
  <div class="container-fluid">
    <div class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Manage Permission</h2>
                </div>

                <div class="card-body">
                    <button class="btn btn-info btn-flat pull-right m-t-10" data-toggle="modal"
                            data-target="#permission-modal">Add
                        Permission</button>
                    <div class="table-responsive m-t-40">
                        <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="permissions_table">
                            <thead>
                                <tr>
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

    <!-- Edit Permission Modal Here -->
    <div id="permission-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Permission
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            {{ Form::open(array('url' => 'permissions', 'id' => 'permission_form')) }}
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                {{ Form::label('permission_name', 'Name') }}
                                {{ Form::text('name', '', array('class' => 'form-control')) }}
                            </div>
                            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
    <!-- End Permission Modal -->
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
            var dataTable = $('#permissions_table').DataTable({
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
                    url :"{{ route('getAllPermissions') }}", // json datasource
                    type: "get"
                },
                searchDelay: 350,
                "lengthMenu": [[10, 25, 50, 100, 200, 500], [10, 25, 50, 100, 200, 500]],
                aoColumns: [
                    { data: 'name', name:'name' },
                    { data: 'action', name:'action' }

                ]
            });
        })
    </script>
@endsection
