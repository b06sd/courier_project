@extends('layouts.dashboard')
@section('content')
  <h4 style="margin-top: 0;"><b>Courier</b></h4>
  <hr class="featurette">

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#add-consignee">Add Consignee</a></li>
    <li><a data-toggle="tab" href="#view-consignee">View Consignee</a></li>
  </ul>

  <div class="tab-content">
    <div id="add-consignee" class="tab-pane fade in active">
    	<br>
    	<div class="col-sm-8">
		<form>
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
		        <input type="text" class="form-control" name="phone" value="" />
		    </div>
		    <div class="form-group">
		        <label for="">Email</label>
		        <input type="email" class="form-control" name="email" value="" />
		    </div>
		    <div class="form-group">
        		<button class="btn btn-primary" type="submit" id="consignee_btn">Submit</button>
        	</div>
	    </form>
		</div>
		<div class="col-sm-4">
			
		</div>
    </div>
    <div id="view-consignee" class="tab-pane fade">
    	<br>
      <table class="table table-borderless" id="users-table">
		  <thead>
		    <tr>
		      <th scope="col">Name</th>
		      <th scope="col">Phone Number</th>
		      <th scope="col">Email</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">1</th>
		      <td>Mark</td>
		      <td>Otto</td>
		      <td>@mdo</td>
		    </tr>
		    <tr>
		      <th scope="row">2</th>
		      <td>Jacob</td>
		      <td>Thornton</td>
		      <td>@fat</td>
		    </tr>
		    <tr>
		      <th scope="row">3</th>
		      <td colspan="2">Larry the Bird</td>
		      <td>@twitter</td>
		    </tr>
		  </tbody>
	  </table>
    </div>
  </div>
@stop