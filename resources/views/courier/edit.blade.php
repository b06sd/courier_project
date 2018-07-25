@extends('layouts.template')
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
                            <form method="post" action="/courier/{{$courier->id}}" id="courier_form">
                                {{ method_field('PATCH') }}
                                @csrf
                                <div class="row">
                                    <div class="m-t-20 p-20 col-md-6">
                                        <div class="form-group">
                                            <label for="">Shipper Name</label>
                                            {{--<select name="shipper" id="shipper" class="form-control" required="required">--}}
                                                {{--<option value="">Select Client</option>--}}
                                                {{--<option value="new">New</option>--}}
                                                {{--@foreach ($couriers as $courier)--}}
                                                    {{--<option value="{{$courier->id}}">{{$courier->name}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                            {{--{{ Form::select('shipper', $couriers, $courier->id, array( 'class' => 'form-control select2', 'id' => 'shipper')) }}--}}
                                            <input type="text" id="one" class="form-control" name="name" value="{{ $courier->name }}" required="required" />
                                        </div>

                                        <div class="form-group">
                                            <label for="">Shipper's Address</label>
                                            <textarea class="form-control" name="address" required="required">{{ $courier->address }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Shipper's Phone Number</label>
                                            <input type="text" id="three" class="form-control" name="phone_number" value="{{ $courier->phone_number }}" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Shipper's Email</label>
                                            <input type="text" id="four" class="form-control" name="email" value="{{ $courier->email }}" required="required" />
                                        </div>

                                        <div class="form-group">
                                            <label for="">Full Shipping Description</label>
                                            <textarea class="form-control" name="description" required="required">{{ $courier->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Received By</label>
                                            <input type="text" class="form-control" name="received_by" value="{{ $courier->received_by }}" required="required" />
                                        </div>
                                    </div>
                                    <div class="m-t-20 p-20 col-md-6">
                                        <div class="form-group">
                                            <label>Consignee</label>
                                            {{ Form::select('consignee_id', $consignees, $courier->consignee_id, array( 'class' => 'form-control select2', 'id' => 'consignee')) }}
                                        </div>

                                        {{--<div id="consignee_details" class="hidden">--}}
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
                                        {{--</div>--}}

                                        <div class="form-group">
                                            <label for="">Pickup Date </label>
                                            <input type="date" class="form-control" name="pickup_date" id="pickup_date" value="{{ $courier->pickup_date }}" placeholder="{{ $courier->pickup_date }}" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Date Dispatched</label>
                                            <input type="date" class="form-control" name="dispatch_date" id="dispatch_date" value="{{ $courier->dispatch_date }}" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Date Delivered</label>
                                            <input type="date" class="form-control" name="delivery_date" id="delivery_date" value="{{ $courier->delivery_date }}" required="required"  />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mode of Payment</label>
                                            <select name="payment_mode" id="payment_mode" class="form-control" required="required">
                                                <option value="">Select a Payment</option>
                                                <option value="Credit">Credit</option>
                                                <option value="Cash">Cash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button id="add_button" class="btn btn-twitter btn-flat">Add Button</button>

                                <div class="row p-t-20 input_fields_wrap">
                                    @php
                                        $x = 0;
                                        $sum = 0;
                                        $qty = 0;
                                    @endphp
                                    @foreach($prod as $key => $p)
                                        @if($x == 0)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Product</label>
                                                    <select name="product_id[]" class="form-control product" required="required">
                                                        <option value="">Select Product</option>
                                                        @foreach ($products as $product)
                                                            <option value="{{$product->id}}" @if($product->id == $p->id) selected="selected" @endif >{{$product->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="product_price" class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Price</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">&#8358;</div>
                                                        </div>
                                                        <input type="text" class="form-control prod_price_test" name="price[]" step="0.01" min="1" value="{{ $p->price }}" readonly required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="product_qty" class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Quantity</label>
                                                    <input type="text" class="form-control quantity" name="quantity[]" min="1" value="{{ $p->pivot->quantity }}" required="required">
                                                </div>
                                            </div>
                                            @else
                                                <div class="par{{ $x }}" style="width: 100%;">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Product</label>
                                                            <select data-prod="{{ $x }}" name="product_id[]" class="form-control product1" required="required">
                                                                <option value="">Select Product</option>
                                                                @foreach ($products as $product)
                                                                    <option value="{{$product->id}}" @if($product->id == $p->id) selected="selected" @endif >{{$product->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="product_price" class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Price</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">&#8358;</div>
                                                                </div>
                                                                <input type="text" class="form-control prod_price_test" name="price[]" step="0.01" min="1" value="{{ $p->price }}" data-price="{{ $x }}" readonly required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="product_qty" class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Quantity</label>
                                                            <input type="text" class="form-control quantity" name="quantity[]" min="1" value="{{ $p->pivot->quantity }}" required="required">
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void(0)" class="remove_field col-sm-12 m-t-20 m-b-20">Remove</a>
                                                </div><br/>
                                        @endif

                                        @php
                                            $x++;
                                            $sum +=  $p->price;
                                            $qty += $p->pivot->quantity;
                                        @endphp
                                    @endforeach
                                </div>
                                <div class="form-group m-t-40">
                                    <label for="">Amount</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">&#8358;</div>
                                        </div>
                                        <input type="text" class="form-control" id="total_amount" name="amount" value="{{ currencyFormat($courier->amount, 2) }}" step="0.01" min="0" readonly required="required">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group m-t-20">
                                    <input class="btn btn-primary" type="submit" value="Update Courier">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            var total = [];
            var total_amount = $('#total_amount').val();
            var sum = 0;
            var qty = 0;

            Number.prototype.format = function(n, x) {
                var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
                return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
            };

            //Get the consignee_id on loading
            var consignee = $('#consignee').val();
            $.ajax({
                url: '/consignee/'+consignee,
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

            $('#consignee').change(function(){
                var consignee = $('#consignee').val();
                if(consignee != ''){
                    $('#consignee_details').removeClass('hidden');

                    $.ajax({
                        url: '/consignee/'+consignee,
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


            $('.product').change(function(){
                var product = $(this).val();
                if(product != ''){

                    $.ajax({
                        url: '/products/'+product,
                        type: 'GET',
                        beforeSend: function ()
                        {
                            //alert(name);
                        },
                        success: function(response) {
                            console.log(response);
                            $('.product').parents( "div.col-md-4" ).next('div.col-md-4').children('div.form-group').children('div.input-group').children('input.form-control').val(response.price);

                            $('#total_amount').val('');
                            sum = 0;
                            qty = 0;


                            $('.prod_price_test').each(function(i, e) {
                                if($(e).val() !== ''){
                                    sum += parseFloat($(e).val());
                                }
                            });
                            $('.quantity').each(function(i, e) {
                                qty += parseInt($(e).val()) ? parseInt($(e).val()) : 1;
                            });
                            $('#total_amount').val((sum * qty).format(2));
                        },
                        error: function(response) {
                            console.log(response);
                            alert('Operation failed');
                        }
                    });
                }
                else {
                    $('#courier_form').find('[name="price[]"]').val('').end();
                }
            });

            //Add dynmic fields
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $("#add_button"); //Add button ID

            var x = {{ $x }}; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="par'+x+'" style="width: 100%;"><div class="col-md-4">\
                            <div class="form-group">\
                            <label for="">Product</label>\
                            <select name="product_id[]" class="form-control product1" data-prod="'+x+'" required="required">\
                            <option value="">Select Product</option>\
                    @foreach ($products as $product)\
                    <option value="{{$product->id}}">{{$product->name}}</option>\
                            @endforeach\
                            </select>\
                            </div>\
                            </div>\
                            <div id="product_price" class="col-md-4">\
                            <div class="form-group">\
                            <label for="">Price</label>\
                            <div class="input-group">\
                            <div class="input-group-prepend">\
                            <div class="input-group-text">&#8358;</div>\
                    </div>\
                    <input type="number" class="form-control prod_price_test" name="price[]" data-new-price="" data-price="'+x+'" value="" step="0.01" min="1" required="required" readonly>\
                    </div>\
                    </div>\
                    </div>\
                    <div id="product_qty" class="col-md-4">\
                            <div class="form-group">\
                            <label for="">Quantity</label>\
                            <input type="number" class="form-control quantity" name="quantity[]" value="" min="1" required="required">\
                            </div>\
                            </div><a href="#" class="remove_field col-sm-12 m-t-20 m-b-20">Remove</a></div><br/>'); //add input box

                    $('.product1').change(function(){
                        var product = $(this).val();
                        var dataProd = $(this).data('prod');
                        $.ajax({
                            url: '/products/'+product,
                            type: 'GET',
                            beforeSend: function ()
                            {
                                //alert(name);
                            },
                            success: function(response) {
                                console.log(response);
                                $('#total_amount').val('');
                                sum = 0;
                                qty = 0;
                                $('.prod_price_test').each(function(i, e) {
                                    if(dataProd == $(this).data('price')){
                                        $(e).val(response.price)
                                    }
                                    if($(e).val() !== ''){
                                        sum += parseFloat($(e).val());
                                    }
                                });
                                $('.quantity').each(function(i, e) {
                                    qty += parseInt($(e).val()) ? parseInt($(e).val()) : 1;
                                });
                                $('#total_amount').val((sum * qty).format(2));
                            },
                            error: function(response) {
                                console.log(response);
                                alert('Operation failed');
                            }
                        });
                    });

                    //When there is a keyUp recalculate again
                    $('.quantity').keyup(function(){
                        $('#total_amount').val('');
                        sum = 0;
                        qty = 0;

                        $('.prod_price_test').each(function(i, e) {
                            if($(e).val() !== ''){
                                sum += parseFloat($(e).val());
                            }
                        });
                        $('.quantity').each(function(i, e) {
                            qty += parseInt($(e).val()) ? parseInt($(e).val()) : 1;
                        });
                        $('#total_amount').val((sum * qty).format(2));
                    });
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
                $('#total_amount').val('');
                sum = 0;
                qty = 0;
                $('.prod_price_test').each(function(i, e) {
                    if($(e).val() !== ''){
                        sum += parseFloat($(e).val());
                    }
                });
                $('.quantity').each(function(i, e) {
                    qty += parseInt($(e).val()) ? parseInt($(e).val()) : 1;
                });
                $('#total_amount').val((sum * qty).format(2));
            });

            $('.product1').change(function(){
                var product = $(this).val();
                var dataProd = $(this).data('prod');
                $.ajax({
                    url: '/products/'+product,
                    type: 'GET',
                    beforeSend: function ()
                    {
//                        alert(product);
                    },
                    success: function(response) {
                        console.log(response);
                        $('#total_amount').val('');
                        sum = 0;
                        qty = 0;
                        $('.prod_price_test').each(function(i, e) {
                            if(dataProd == $(this).data('price')){
                                $(e).val(response.price)
                            }
                            if($(e).val() !== ''){
                                sum += parseFloat($(e).val());
                            }
                        });
                        $('.quantity').each(function(i, e) {
                            qty += parseInt($(e).val()) ? parseInt($(e).val()) : 1;
                        });
                        $('#total_amount').val((sum * qty).format(2));
                    },
                    error: function(response) {
                        console.log(response);
                        alert('Operation failed');
                    }
                });
            });

            //When there is a keyUp recalculate again
            $('.quantity').keyup(function(){
                $('#total_amount').val('');
                sum = 0;
                qty = 0;

                $('.prod_price_test').each(function(i, e) {
                    if($(e).val() !== ''){
                        sum += parseFloat($(e).val());
                    }
                });
                $('.quantity').each(function(i, e) {
                    qty += parseInt($(e).val()) ? parseInt($(e).val()) : 1;
                });
                console.log(sum);
                console.log(qty);
                console.log(qty * sum);
                $('#total_amount').val((sum * qty).format(2));
            });

        });
    </script>
@endsection