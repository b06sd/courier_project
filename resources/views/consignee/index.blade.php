@extends('layouts.template')

@section('styles')
@endsection

@section('content')
<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Logistic Management</h3> </div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Manage Consignee</a></li>
				<li class="breadcrumb-item active">Dashboard</li>
			</ol>
		</div>
	</div>
	<div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('flash::message')
             </div>
        </div>
    </div>
	<!-- End Bread crumb -->
	<div class="container-fluid">
		<div class="content">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">Consignee Management</div>
						<div class="card-body">
							<button class="btn btn-outline-info btn-flat pull-right m-t-10" data-toggle="modal"
							data-target="#add-consignee">Add Consignee</button>
							<br>
							<form method="post" action="/consignee">
								@csrf
								<div class="modal fade" id="add-consignee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Create new Consignee
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
											</h4>
											</div>
											<div class="modal-body">
												<div class="form-group">
													<label for="">Name</label>
													<input type="text" class="form-control" name="name" value="" />
												</div>
												<div class="form-group">
													<label for="">Address</label>
													<textarea class="form-control" name="address" value="" rows="8"></textarea>
												</div>
												<div class="form-group">
													<label for="">Phone Number</label>
													<input type="text" class="form-control" name="phone_number" value="" />
												</div>
												<div class="form-group">
													<label for="">Email</label>
													<input type="email" class="form-control" name="email" value="" />
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-outline-primary">Submit</button>
											</div>
										</div>
									</div>
								</div>
							</form>
							{{-- Consignee Edit modal --}}
							<div id="consignee-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Edit Consignee
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
											</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-md-12">
													{!! Form::open(array('id' => 'edit_consignee_form')) !!}
													{{ method_field('PATCH') }}
													{{ csrf_field() }}
													<div class="form-group">
														{!! Form::label('Name edit', 'Name') !!}
														{!! Form::text('name', '', array('class' => 'form-control')) !!}
													</div>
													<div class="form-group">
														{!! Form::label('address edit', 'Address') !!}
														{!! Form::textarea('address', '', array('class' => 'form-control')) !!}
													</div>
													<div class="form-group">
														{!! Form::label('email edit', 'Email') !!}
														{!! Form::email('email', '', array('class' => 'form-control')) !!}
													</div>
													<div class="form-group">
														{!! Form::label('Phone Number edit', 'Phone Number') !!}
														{!! Form::text('phone_number', '', array('class' => 'form-control')) !!}
													</div>
													<div class="modal-footer">
														{!! Form::submit('Update Consignee', array('class' => 'btn btn-primary')) !!}
													</div>
													{!! Form::close() !!}
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							{{-- End of consignee edit modal --}}
							<div class="table-responsive m-t-40">
								<table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="consignee_table">
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
		var dataTable = $('#consignee_table').DataTable({
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
                    url :"{{ route('allConsignees') }}", // json datasource
                    type: "get"
                },
                searchDelay: 350,
                "lengthMenu": [[10, 25, 50, 100, 200, 500], [10, 25, 50, 100, 200, 500]],
                aoColumns: [
                { data: 'name', name:'name' },
                { data: 'email', name: 'email' },
                { data: 'phone_number', name: 'phone_number' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
	})

	$(document).on('click', '.edit_consignee', function(ev) {
		ev.preventDefault();
		var val = $(this).data('edit-consignee');

		$.ajax({
			url: 'consignee/'+val,
			type: 'GET',
			beforeSend: function ()
			{

			},
			success: function(response) {
				console.log(response);

				$('#edit_consignee_form')
				.find('[name="name"]').val(response.name).end()
				.find('[name="address"]').val(response.address).end()
				.find('[name="phone_number"]').val(response.phone_number).end()
				.find('[name="email"]').val(response.email).end();

				$("#edit_consignee_form").attr("action", "consignee/"+response.id);
				$("#consignee-modal-edit").modal({backdrop: 'static', keyboard: true});
			},
			error: function(response) {
				console.log(response);
				alert('Operation failed');
			}
		});
	});

	$(document).on('click', '.del_consignee', function(ev) {
            ev.preventDefault();
            var val = $(this).data('delete-consignee');

                var r = confirm("Do you want to delete this consignee");
                if (r == true) {
                    $.ajax({
                        type: 'post',
                        url: "consignee/"+val,
                        data: {
                            '_method': 'DELETE',
                            'id': val
                        },
                        success: function(data) {
                            window.location.href = "{{ route('consignee.index') }}";
                        }
                    });
                }
            });
	 
</script>
@endsection