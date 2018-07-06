@extends('layouts.dashboard')
@section('content')
  <h4 style="margin-top: 0;"><b>Courier</b></h4>
  <hr class="featurette">

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#add-courier">Add Courier</a></li>
    <li><a data-toggle="tab" href="#view-courier">View Courier</a></li>
  </ul>

  <div class="tab-content">
    <div id="add-courier" class="tab-pane fade in active">
    	<br>
		<form>
		  <div class="col-sm-6">
		  	<div class="form-group">
		        <label for="">Shipper's Name</label>
		            <select name="ship_name" id="ship_name" class="form-control">
		                <option value="">Select Client</option>
		                <option value="1">FIRS</option>                                    
		            </select>
		  	</div>
		  	<div id="client_detail" class="hidden">
		        <div class="form-group">
		            <label for="">Shipper's Address</label>
		            <input type="text" class="form-control" name="ship_address" value="" />
		        </div>

		        <div class="form-group">
		            <label for="">Shipper's Phone Number</label>
		            <input type="text" class="form-control" name="ship_phone" value="" />
		        </div>

		        <div class="form-group">
		            <label for="">Shipper's Email</label>
		            <input type="text" class="form-control" name="ship_email" value="" />
		        </div>
		    </div>
			<div class="form-group">
		        <label for="">Shipping Service</label>
		        <select name="ship_service" id="" class="form-control">
		            <option value="">Select a Shipping service</option>
		            <option value="Document" >Document</option>
		            <option value="Parcel" >Parcel</option>
		        </select>
		    </div>
		    <div class="form-group">
		        <label for="">Full Shipping Description</label>
		        <textarea class="form-control" name="ship_receive" value="" rows="8"></textarea>
		    </div>
		    <div class="form-group">
		        <label for="">Received By</label>
		        <input type="text" class="form-control" name="ship_receive" value="" />
		    </div>
		  </div>
		  <div class="col-sm-6">
    	<div class="form-group">
            <label>Consignee</label>
                <select name="client_consignee" class="form-control" required="required" id="client_consignee">
                <option value="">Select Consignee</option>
                <option value="new">New</option>
                <option value='1'>Kingsley Udenewu</option>                                    
            	</select>
        </div>
        <div id="consignee_details" class="hidden">
            <div class="form-group">
                <label for="">Consignee's Name</label>
                <input type="text" class="form-control" name="cons_name" value="" />
            </div>
			<div class="form-group">
                <label for="">Consignee's Address</label>
                <input type="text" class="form-control" name="cons_address" value="" />
            </div>
            <div class="form-group">
                <label for="">Consignee's Phone Number</label>
                <input type="text" class="form-control" name="cons_phone" value="" />
            </div>
            <div class="form-group">
                <label for="">Consignee's Email</label>
                <input type="email" class="form-control" name="cons_email" value="" />
            </div>
        </div>        
        <div class="form-group">
            <label for="">Pickup Date</label>
            <input type="date" class="form-control" name="date_picked" id="date_picked" value="" />
        </div>
        <div class="form-group">
            <label for="">Date Dispatched</label>
            <input type="date" class="form-control" name="date_dispatched" id="date_dispatched" value="" />
        </div>
        <div class="form-group">
            <label for="">Date Delivered</label>
            <input type="date" class="form-control" name="date_delivered" id="date_delivered" value="" />
        </div>
        <div class="form-group">
            <label for="">Mode of Payment</label>
            <select name="mod_pay" id="mod_pay" class="form-control">
                <option value="">Select a Payment</option>
                <option value="Credit" >Credit</option>
                <option value="Cash" >Cash</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Amount</label>
            <input type="number" class="form-control" name="amount" value="" />
        </div>
        <div class="form-group">
        	<button class="btn btn-primary" type="submit" id="pharm_btn">Submit</button>
        </div>
	  </form>
    </div>
    </div>
    <div id="view-courier" class="tab-pane fade">
    	<br>
      <table class="table table-borderless" id="users-table">
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
		    <tr>
		      <th scope="row">1</th>
		      <td>Mark</td>
		      <td>Otto</td>
		      <td>@mdo</td>
		      <td>Mark</td>
		      <td>Otto</td>
		    </tr>
		    <tr>
		      <th scope="row">2</th>
		      <td>Jacob</td>
		      <td>Thornton</td>
		      <td>@fat</td>
		      <td>Mark</td>
		      <td>Otto</td>
		    </tr>
		    <tr>
		      <th scope="row">3</th>
		      <td colspan="2">Larry the Bird</td>
		      <td>@twitter</td>
		      <td>Mark</td>
		      <td>Otto</td>
		    </tr>
		  </tbody>
	  </table>
    </div>
  </div>
@stop
@push('scripts')
<script type="text/javascript">

$('#ship_name').change(function(){
        var ship_name = $('#ship_name').val();
        if(ship_name != ''){
            $('#client_detail').removeClass('hidden');
            $.ajax({
                url: BASE_URL+'courier',
                type: "POST",
                data: 'ship_name_id='+ship_name,
                beforeSend: function () {

                },
                success: function (response) {
                    var parse = JSON.parse(response);
                    console.log(parse);
                    if (parse.status_code == "200") {
                        $('#courier_form')
                        .find('[name="ship_address"]').val(parse.data.cu_address).end()
                        .find('[name="ship_phone"]').val(parse.data.cu_phone).end()
                        .find('[name="ship_fax"]').val(parse.data.cu_fax).end()
                        .find('[name="ship_email"]').val(parse.data.cu_email).end();
                    }
                }
            });
        }
        else $('#client_detail').addClass('hidden');
    });

</script>
@endpush