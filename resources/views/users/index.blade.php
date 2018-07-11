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
        <li class="breadcrumb-item"><a href="javascript:void(0)">Manage Users</a></li>
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
                <div class="card-header">User Management</div>
                <div class="card-body">
                    <button class="btn btn-info btn-flat pull-right m-t-10" data-toggle="modal"
                            data-target="#user-modal">Add User</button>
                    <div class="table-responsive m-t-40">
                        <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="users_table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--@foreach ($users as $user)--}}
                                {{-- <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                <a href="{{ URL::to('users/'.$user->id.'/edit') }}" class="btn btn-warning pull-left">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                </td>
                                </tr> --}}
                                {{--@endforeach--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>    
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
            $('#users_table').DataTable({
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
                    url :"{{ route('allUsers') }}", // json datasource
                    type: "get"
                },
                searchDelay: 350,
                "lengthMenu": [[10, 25, 50, 100, 200, 500], [10, 25, 50, 100, 200, 500]],
                aoColumns: [

                    { data: 'name', name:'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            $(document).on('click', '.edit_user', function(ev) {
                ev.preventDefault();
                var val = $(this).data('edit-user');

                $.ajax({
                    url: 'users/'+val,
                    type: 'GET',
                    beforeSend: function ()
                    {

                    },
                    success: function(response) {
//                        console.log(response);

                        $('#edit_user_form')
                            .find('[name="name"]').val(response.name).end()
                            .find('[name="email"]').val(response.email).end()
                            .find('[name="phone"]').val(response.phone).end();


                        $('.roles').each(function (index, e) {
                            if($(this).val() == response.role_id){
                                $(this).prop('checked', true);
                            }
                        });


                        $("#edit_user_form").attr("action", "users/"+response.id);
                        $("#user-modal-edit").modal({backdrop: 'static', keyboard: true});
                    },
                    error: function(response) {
                        alert('Operation failed');
                    }
                });
            });

            $(document).on('click', '.del_user', function(ev) {
                ev.preventDefault();
                var val = $(this).data('delete-user');

                var r = confirm("Do you want to delete this user");
                if (r == true) {
                    $.ajax({
                        type: 'post',
                        url: "users/"+val,
                        data: {
                            '_method': 'DELETE',
                            'id': val
                        },
                        success: function(data) {
                            window.location.href = "{{ route('users.index') }}";
                        }
                    });
                }
//                $('#company_form').hide();
//                $('#company-modal-edit').modal('show');
            });
        })
    </script>
@endsection
