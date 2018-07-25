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
        <li class="breadcrumb-item"><a href="javascript:void(0)">Manage Courier</a></li>
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
            <div class="card-header">Courier Management</div>
            <div class="card-body">
              <a class="btn btn-info btn-flat pull-right m-t-10" href="{{ route('courier.create') }}">Add Courier</a>
              {{-- courier Edit modal --}}
              <div id="courier-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Courier
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                      </h4>
                    </div>
                    <div class="modal-body">
                      {!! Form::open(array('id' => 'edit_courier_form')) !!}
                          {{ method_field('PATCH') }}
                          {{ csrf_field() }}
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            {!! Form::label('Name edit', 'Name') !!}
                            {!! Form::text('name', '', array('class' => 'form-control', 'required' => 'required')) !!}
                          </div>
                          <div class="form-group">
                            {!! Form::label('address edit', 'Address') !!}
                            {!! Form::textarea('address', '', array('class' => 'form-control', 'required' => 'required')) !!}
                          </div>
                          <div class="form-group">
                            {!! Form::label('Phone Number edit', 'Phone Number') !!}
                            {!! Form::text('phone_number', '', array('class' => 'form-control', 'required' => 'required')) !!}
                          </div>
                          <div class="form-group">
                            {!! Form::label('email edit', 'Email') !!}
                            {!! Form::email('email', '', array('class' => 'form-control', 'required' => 'required')) !!}
                          </div>
                          <div class="form-group">
                            {!! Form::label('shipping_service edit', 'Shipping Service') !!}
                            {!! Form::select('shipping_service', ['Document' => 'Document', 'Parcel' => 'Parcel'], '', ['class' => 'form-control', 'id'=> 'shipping_service', 'required' => 'required']) !!}
                          </div>
                          <div class="form-group">
                            {!! Form::label('desc edit', 'Description') !!}
                            {!! Form::textarea('description', '', array('class' => 'form-control', 'required' => 'required')) !!}
                          </div>
                          <div class="form-group">
                            {!! Form::label('receiver edit', 'Received By') !!}
                            {!! Form::text('received_by', '', array('class' => 'form-control', 'required' => 'required')) !!}
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            {!! Form::label('Consignee', 'Consignee') !!}
                            <select name="consignee" class="form-control" required="required" id="consignee_id">
                              <option value="">Select Consignee</option>
                              @foreach ($consignees as $consignee)
                                <option value="{{$consignee->id}}">{{$consignee->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            {!! Form::label('pickup date edit', 'Pickup Date') !!}
                            {!! Form::date('pickup_date', '', array('class' => 'form-control', 'required' => 'required')) !!}
                          </div>
                          <div class="form-group">
                            {!! Form::label('dispatch date edit', 'Dispatch Date') !!}
                            {!! Form::date('dispatch_date', '', array('class' => 'form-control', 'required' => 'required')) !!}
                          </div>
                          <div class="form-group">
                            {!! Form::label('delivery date edit', 'Delivery Date') !!}
                            {!! Form::date('delivery_date', '', array('class' => 'form-control', 'required' => 'required')) !!}
                          </div>
                          <div class="form-group">
                            {!! Form::label('', 'Payment Mode') !!}
                            {!! Form::select('payment_mode', ['Cash' => 'Cash', 'Credit' => 'Credit'], '', ['class' => 'form-control', 'id' => 'payment_mode_edit', 'required' => 'required']) !!}
                          </div>
                          <div class="form-group">
                            {!! Form::label('amount edit', 'Amount') !!}
                            {!! Form::number('amount', '', array('class' => 'form-control', 'step' => '0.01', 'min' => '0', 'required' => 'required')) !!}
                          </div>
                        </div>
                        </div>
                          <div class="modal-footer">
                            {!! Form::submit('Update Courier', array('class' => 'btn btn-primary')) !!}
                          </div>
                    </div>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
              {{-- End of consignee edit modal --}}
              <div class="table-responsive m-t-40">
                <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="courier_table">
                  <thead>
                    <tr>
                    <th scope="col">Consignee</th>
                    <th scope="col">Shipper</th>
                    <th scope="col">Dispatch Date</th>
                    <th scope="col">Delivery Date</th>
                    <th scope="col">Pickup Date</th>
                    <th scope="col">Action</th>
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
<script>

    $(document).ready(function () {
      var dataTable = $('#courier_table').DataTable({
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
                url :"{{ route('allCouriers') }}", // json datasource
                type: "get"
            },
            searchDelay: 350,
            "lengthMenu": [[10, 25, 50, 100, 200, 500], [10, 25, 50, 100, 200, 500]],
            aoColumns: [
            { data: 'consignee.name', name:'consignee.name' },
            { data: 'name', name: 'name' },
            { data: 'dispatch_date', name: 'dispatch_date' },
            { data: 'delivery_date', name: 'delivery_date' },
            { data: 'pickup_date', name: 'pickup_date' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });

    $(document).on('click', '.del_courier', function(ev) {
        ev.preventDefault();
        var val = $(this).data('delete-courier');

        var r = confirm("Do you want to delete this consignee");
        if (r == true) {
            $.ajax({
                type: 'post',
                url: "courier/"+val,
                data: {
                    '_method': 'DELETE',
                    'id': val
                },
                success: function(data) {
                    window.location.href = "{{ route('courier.index') }}";
                }
            });
        }
    });

    $(document).on('click', '.edit_courier', function(ev) {
            ev.preventDefault();
            var val = $(this).data('edit-courier');

            $.ajax({
              url: 'courier/'+val,
              type: 'GET',
              beforeSend: function ()
              {

              },
              success: function(response) {
                console.log(response);

                $('#edit_courier_form')
                  .find('[name="name"]').val(response.name).end()
                  .find('[name="address"]').val(response.address).end()
                  .find('[name="phone_number"]').val(response.phone_number).end()
                  .find('[name="email"]').val(response.email).end()
                  .find('[name="description"]').val(response.description).end()
                  .find('[name="received_by"]').val(response.received_by).end()
                  .find('[name="pickup_date"]').val(response.pickup_date).end()
                  .find('[name="dispatch_date"]').val(response.dispatch_date).end()
                  .find('[name="delivery_date"]').val(response.delivery_date).end()
                  .find('[name="amount"]').val(response.amount).end();

                  localStorage.setItem("shipping_service", response.shipping_service);
                  $('#shipping_service').find('option').each(function(i,e){
                    if($(e).val() == localStorage.getItem("shipping_service")){
                      $('#shipping_service').prop('selectedIndex', i);
                    }
                  });

                  localStorage.setItem("consignee", response.consignee_id);
                  $('#consignee_id').find('option').each(function(i,e){
                    if($(e).val() == localStorage.getItem("consignee")){
                      $('#consignee_id').prop('selectedIndex', i);
                    }
                  });

                  localStorage.setItem("payment_mode", response.payment_mode);
                  $('#payment_mode_edit').find('option').each(function(i,e){
                    if($(e).val() == localStorage.getItem("payment_mode")){
                      $('#payment_mode_edit').prop('selectedIndex', i);
                    }
                  });

                $("#edit_courier_form").attr("action", "courier/"+response.id);
                $("#courier-modal-edit").modal({backdrop: 'static', keyboard: true});
              },
              error: function(response) {
                console.log(response);
                alert('Operation failed');
              }
            });
          });
</script>
@endsection