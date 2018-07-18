@extends('layouts.template')

@section('styles')
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Product Management</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Manage Product</a></li>
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
                        <div class="card-header">Product Management</div>
                        <div class="card-body">
                            <button class="btn btn-info btn-flat pull-right m-t-10" data-toggle="modal"
                                    data-target="#product-modal">Add Product</button>
                            <div class="table-responsive m-t-40">
                                <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="products_table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
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
        </div>
    </div>

    <!-- Add Product Modal Here -->
    <div id="product-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create product
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            {{ Form::open(array('url' => 'products')) }}
                            <div class="form-group">
                                {{ Form::label('product_name', 'Name') }}
                                {{ Form::text('name', '', array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('price', 'Price') }}
                                {{ Form::text('price', '', array('class' => 'form-control')) }}
                            </div>

                            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Permission Modal -->

    <!-- Edit Product Modal Here -->
    <div id="product-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Product
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            {{ Form::open(array('id' => 'product_form')) }}
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                {{ Form::label('permission_name', 'Name') }}
                                {{ Form::text('name', '', array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('price', 'Price') }}
                                {{ Form::text('price', '', array('class' => 'form-control')) }}
                            </div>
                            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                            {{ Form::close() }}
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
            $('#products_table').DataTable({
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
                    url :"{{ route('allProducts') }}", // json datasource
                    type: "get"
                },
                searchDelay: 350,
                "lengthMenu": [[10, 25, 50, 100, 200, 500], [10, 25, 50, 100, 200, 500]],
                aoColumns: [

                    { data: 'name', name:'name' },
                    { data: 'price', name: 'price' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            $(document).on('click', '.edit_product', function(ev) {
                ev.preventDefault();
                var val = $(this).data('edit-product');

                $.ajax({
                    url: 'products/'+val,
                    type: 'GET',
                    beforeSend: function ()
                    {

                    },
                    success: function(response) {
                        console.log(response);

                        $('#product_form')
                                .find('[name="name"]').val(response.name).end()
                                .find('[name="price"]').val(response.price).end();


                        $("#product_form").attr("action", "products/"+response.id);
                        $("#product-modal-edit").modal({backdrop: 'static', keyboard: true});
                    },
                    error: function(response) {
                        console.log(response);
                        alert('Operation failed');
                    }
                });
            });

            $(document).on('click', '.del_product', function(ev) {
                ev.preventDefault();
                var val = $(this).data('delete-product');

                var r = confirm("Do you want to delete this product");
                if (r == true) {
                    $.ajax({
                        type: 'post',
                        url: "products/"+val,
                        data: {
                            '_method': 'DELETE',
                            'id': val
                        },
                        success: function(data) {
                            window.location.href = "{{ route('products.index') }}";
                        }
                    });
                }
            });
        });
    </script>
@endsection
