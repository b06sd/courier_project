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
              <button class="btn btn-outline-info btn-flat pull-right m-t-10" data-toggle="modal"
              data-target="#add-courier">Add Courier</button>
              <br>
              <form method="post" action="/courier" id="courier_form">
                @csrf
                <div class="modal fade" id="add-courier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Create new Courier
                        <button type="button" class="close" style="padding: 0.5rem;" data-dismiss="modal" aria-hidden="true">x</button>
                      </h5>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Shipper</label>
                        <select name="shipper" id="shipper" class="form-control" required="required">
                          <option value="">Select Client</option>
                          <option value="new">New</option>
                          @foreach ($courier as $client)
                          <option value="{{$client->id}}">{{$client->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div id="client_detail" class="hidden">
                        <div class="form-group">
                          <label for="">Shipper's Name</label>
                          <input type="text" id="one" class="form-control" name="name" value="" readonly required="required" />
                        </div>
                        <div class="form-group">
                          <label for="">Shipper's Address</label>
                          <input type="text" id="two" class="form-control" name="address" value="" readonly required="required" />
                        </div>
                        <div class="form-group">
                          <label for="">Shipper's Phone Number</label>
                          <input type="text" id="three" class="form-control" name="phone_number" value="" readonly required="required" />
                        </div>
                        <div class="form-group">
                          <label for="">Shipper's Email</label>
                          <input type="text" id="four" class="form-control" name="email" value="" readonly required="required" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Shipping Service</label>
                        <select name="shipping_service" id="" class="form-control" required="required">
                          <option value="">Select a Shipping service</option>
                          <option value="Document" >Document</option>
                          <option value="Parcel" >Parcel</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Full Shipping Description</label>
                        <textarea class="form-control" name="description" value="" rows="8" required="required"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="">Received By</label>
                        <input type="text" class="form-control" name="received_by" value="" required="required" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Consignee</label>
                        <select name="consignee" class="form-control" required="required" id="consignee">
                          <option value="">Select Consignee</option>
                          @foreach ($consignees as $consignee)
                          <option value="{{$consignee->id}}">{{$consignee->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div id="consignee_details" class="hidden">
                        <div class="form-group">
                          <label for="">Consignee's Name</label>
                          <input type="text" class="form-control" name="cons_name" value="" readonly required="required" />
                        </div>
                        <div class="form-group">
                          <label for="">Consignee's Address</label>
                          <input type="text" class="form-control" name="cons_address" value="" readonly required="required" />
                        </div>
                        <div class="form-group">
                          <label for="">Consignee's Phone Number</label>
                          <input type="text" class="form-control" name="cons_phone" value="" readonly required="required" />
                        </div>
                        <div class="form-group">
                          <label for="">Consignee's Email</label>
                          <input type="email" class="form-control" name="cons_email" value="" readonly required="required" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Pickup Date</label>
                        <input type="date" class="form-control" name="pickup_date" id="pickup_date" value="" required="required" />
                      </div>
                      <div class="form-group">
                        <label for="">Date Dispatched</label>
                        <input type="date" class="form-control" name="dispatch_date" id="dispatch_date" value="" required="required" />
                      </div>
                      <div class="form-group">
                        <label for="">Date Delivered</label>
                        <input type="date" class="form-control" name="delivery_date" id="delivery_date" value="" required="required" />
                      </div>
                      <div class="form-group">
                        <label for="">Mode of Payment</label>
                        <select name="payment_mode" id="payment_mode" class="form-control" required="required">
                          <option value="">Select a Payment</option>
                          <option value="Credit" >Credit</option>
                          <option value="Cash" >Cash</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Amount</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text">&#8358;</div>
                          </div>
                          <input type="number" class="form-control" id="inlineFormInputGroup" name="amount" value="" step="0.01" min="0" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <button class="btn btn-primary" type="submit" id="pharm_btn">Submit</button>
                      </div>
                    </div>
                  </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
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
                    <th scope="col">Amount</th>
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
{{--    <script src="{{ asset('temp/js/lib/datatables/datatables-init.js }}"></script>--}}
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
                        { data: 'amount', name: 'amount' },
                        { data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                    });
          })

          $('#shipper').change(function(){
            var shipper = $('#shipper').val();
            if(shipper != ''){

              $('#client_detail').removeClass('hidden');

              // var val = $(this).data('courier-id');
              if (shipper != 'new') {

                document.getElementById("one").setAttribute("readonly", true);
                document.getElementById("two").setAttribute("readonly", true);
                document.getElementById("three").setAttribute("readonly", true);
                document.getElementById("four").setAttribute("readonly", true);

              $.ajax({
              url: 'courier/'+shipper,
              type: 'GET',
              beforeSend: function ()
            {
              //alert(name);
            },


            success: function(response) {
              console.log(response);

              $('#courier_form')
              .find('[name="name"]').val(response.name).end()
              .find('[name="address"]').val(response.address).end()
              .find('[name="phone_number"]').val(response.phone_number).end()
              .find('[name="email"]').val(response.email).end();

              // $("#courier_form").attr("action", "courier/"+response.id);
            },
            error: function(response) {
              console.log(response);
              alert('Operation failed');
            }
          });
              }
              else { 

                document.getElementById("one").removeAttribute("readonly");
                document.getElementById("two").removeAttribute("readonly");
                document.getElementById("three").removeAttribute("readonly");
                document.getElementById("four").removeAttribute("readonly");

                $('#courier_form') 

              .find('[name="name"]').val('').end()
              .find('[name="address"]').val('').end()
              .find('[name="phone_number"]').val('').end()
              .find('[name="email"]').val('').end();

              }
            }
            else $('#client_detail').addClass('hidden');
          });

          $('#consignee').change(function(){
            var consignee = $('#consignee').val();
            if(consignee != ''){
              $('#consignee_details').removeClass('hidden');
             
                $.ajax({
            url: 'consignee/'+consignee,
            type: 'GET',
            beforeSend: function ()
            {
              //alert(name);
            },
            success: function(response) {
              console.log(response);

              $('#courier_form')
              .find('[name="cons_name"]').val(response.name).end()
              .find('[name="cons_address"]').val(response.address).end()
              .find('[name="cons_phone"]').val(response.phone_number).end()
              .find('[name="cons_email"]').val(response.email).end();

              // $("#courier_form").attr("action", "courier/"+response.id);
            },
            error: function(response) {
              console.log(response);
              alert('Operation failed');
            }
          });
              
            }
            else $('#consignee_details').addClass('hidden');
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