@extends('layouts.template')

@section('styles')
@endsection

@section('content')
<!-- Bread crumb -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h3 class="text-primary">Customer Management</h3> </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Manage Account</a></li>
        <li class="breadcrumb-item active">Account List</li>
      </ol>
    </div>
  </div>
  <!-- End Bread crumb -->
  <div class="container-fluid">
    <div class="content">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Customer Management</div>
            <div class="card-body">
              <a class="btn btn-info btn-flat pull-right m-t-10" href="{{ route('accounts.create') }}">Create Account</a>
              <br/>
              <div class="table-responsive m-t-40">
                <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="users_table">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Budget</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($accounts as $account)
                    <tr>
                      <td>{{ $account['display_name'] }}</td>
                      <td>{{ $account['email'] }}</td>
                      <td>{{ $account['phone_1'] }}</td>
                      <td>{{ $account['budget'] }}</td>
                      <td>
                        <a href="#" class="btn btn-warning pull-left">Edit</a>
                        {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                        {!! Form::close() !!}
                      </td>
                    </tr>
                    @endforeach
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

  @endsection
