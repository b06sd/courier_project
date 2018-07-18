<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courier;
use App\Consignee;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courier = Courier::all();
        $consignees = Consignee::all(['id', 'name']);
        return view('courier.index', compact('courier', 'consignees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|max:50',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'shipping_service' => 'required',
            'description' => 'required',
            'received_by' => 'required',
            'pickup_date' => 'required',
            'dispatch_date' => 'required',
            'delivery_date' => 'required',
            'payment_mode' => 'required',
            'amount' => 'required'
        ]);

        $courier = new Courier;

        $courier->name = request('name');
        $courier->address = request('address');
        $courier->phone_number = request('phone_number');
        $courier->email = request('email');
        $courier->shipping_service = request('shipping_service');
        $courier->description = request('description');
        $courier->consignee_id = request('consignee');
        $courier->received_by = request('received_by');
        $courier->pickup_date = request('pickup_date');
        $courier->dispatch_date = request('dispatch_date');
        $courier->delivery_date = request('delivery_date');
        $courier->payment_mode = request('payment_mode');
        $courier->amount = request('amount');

        $courier->save();

        flash('Courier Succesfully added!')->success();

        return redirect('/courier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Courier::select(DB::raw('id, name, address, phone_number, email, shipping_service, description, consignee_id, received_by, pickup_date, dispatch_date, delivery_date, payment_mode, amount'))
            ->where('id', '=', $id)
            ->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courier $courier)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'shipping_service' => 'required',
            'description' => 'required',
            'received_by' => 'required',
            'pickup_date' => 'required',
            'dispatch_date' => 'required',
            'delivery_date' => 'required',
            'payment_mode' => 'required',
            'amount' => 'required'
        ]);

        $update = Courier::where('id', $courier->id)->update([
            'name'=> $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'shipping_service' => $request->shipping_service,
            'description' => $request->description,
            'consignee_id' => $request->consignee,
            'received_by' => $request->received_by,
            'pickup_date' => $request->pickup_date,
            'dispatch_date' => $request->dispatch_date,
            'delivery_date' => $request->delivery_date,
            'payment_mode' => $request->payment_mode,
            'amount' => $request->amount
        ]);

        if($update){
            flash('Operation successful')->success();
            return redirect()->route('courier.index');

        }
        else{
            flash('Operation failed')->error();
            return redirect()->route('courier.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courier $courier)
    {
        $courier->delete();
        flash('Operation successful')->success();
        return response ()->json ();
    }

    public function allCouriers()
    {

        $couriers =  Courier::with(['consignee' => function($query){
            $query->orderBy('name', 'asc');
        }])->get();

        return Datatables::of($couriers)
        ->addColumn('action', function ($courier) {
                return '<a data-edit-courier="'.$courier->id.'" class="btn btn-flat btn-info 
                edit_courier"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                '<a  data-delete-courier="'.$courier->id.'"  class="btn btn-flat btn-danger  del_courier"><i class="glyphicon 
                glyphicon-edit"></i> Delete</a>';
            })
        ->make(true);

        // return Datatables::of($couriers)
        //     ->addColumn('action', function ($courier) {

        //         return '<a data-edit-courier="'.$courier->id.'" class="btn btn-flat btn-info 
        //         edit_courier"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
        //         '<a  data-delete-courier="'.$consignee->id.'"  class="btn btn-flat btn-danger  del_courier"><i class="glyphicon 
        //         glyphicon-edit"></i> Delete</a>';
        //     })
        //     ->make(true);
    }
}
