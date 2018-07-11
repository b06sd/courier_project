@extends('layouts.template')
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
  <!-- End Bread crumb -->
<div class="container-fluid">
	<div class="content">
		<div class="card">
			<div class="card-body p-b-0">
				<h4 class="card-title">Consignee Management</h4>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs customtab" role="tablist">
					<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#add-consignee" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Add Consignee</span></a> </li>
					<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#view-consignee" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">View Consignee</span></a> </li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active show" id="add-consignee" role="tabpanel">
						<div class="p-20">
							<h5>Add Consignee</h5>
							<hr class="featurette">
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
										<button class="btn btn-success" type="submit" id="consignee_btn">Submit</button>
									</div>
								</form>
							</div>
							<div class="col-sm-4">

							</div>
						</div>
					</div>
					<div class="tab-pane p-20" id="view-consignee" role="tabpanel">
						<h5>View Consignee</h5>
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
			</div>
		</div>
	</div>
</div>
@stop
