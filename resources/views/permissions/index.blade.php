@extends('layouts.template')

@section('style')
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                        <h2>User Management</h2>

                    {{--<div class="col-sm-8">--}}
                        {{--<a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>--}}
                        {{--<a href="{{ route('roles.index') }}" class="btn btn-danger pull-right">Roles</a>--}}
                        {{--<a href="{{ URL::to('permissions/create') }}" class="btn btn-success pull-right">Add Permission</a>--}}
                    {{--</div>--}}

                </div>

                <div class="card-body">
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
@endsection

@push('script')
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
                //fixedHeader: true,
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
@endpush
