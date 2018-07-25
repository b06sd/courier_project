@extends('layouts.template')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Customer Management</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Manage Sales</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('flash::message')
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Sales Management</div>
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="sales_table">
                                    <thead>
                                    <tr>
                                        <th>Consignee Name</th>
                                        <th>Courier Name</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
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
            $('#sales_table').DataTable({
//                dom: 'Bfrtip',
//                buttons: [
//                    'copy', 'csv', 'excel', 'pdf', 'print'
//                ],
                "processing": true,
                "serverSide": true,
                "language": {
                    "processing": "Processing Request"
                },
                "ajax":{
                    url :"{{ route('allSales') }}", // json datasource
                    type: "get"
                },
                searchDelay: 350,
                "lengthMenu": [[10, 25, 50, 100, 200, 500], [10, 25, 50, 100, 200, 500]],
                aoColumns: [
                    { data: 'consignee_name', name:'consignee_name' },
                    { data: 'courier_name', name:'courier_name' },
                    { data: 'qty', name: 'qty' },
                    { data: 'total_amount', name: 'total_amount' }
                ]
            });
        });

    </script>
@endsection
