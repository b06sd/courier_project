<?php

namespace App\Http\Controllers;

use App\Courier;
use Illuminate\Http\Request;
use App\Consignee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ConsigneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consignees = Consignee::all();
        return view('consignee.index', compact('consignees'));
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
            'email' => 'required|email'
        ]);

        $consignee = new Consignee;

        $consignee->name = request('name');
        $consignee->address = request('address');
        $consignee->phone_number = request('phone_number');
        $consignee->email = request('email');

        $consignee->save();

        flash('Consignee Succesfully added!')->success();

        return redirect('/consignee');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Consignee $consignee)
    {
        return Consignee::select(DB::raw('id, name, address, email, phone_number'))
            ->where('id', '=', $consignee->id)
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
    public function update(Request $request, Consignee $consignee)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email'
        ]);

        $update = Consignee::where('id', $consignee->id)->update([
            'name'=> $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email
        ]);

        if($update){
            flash('Consignee Updated')->success();
            return redirect()->route('consignee.index');

        }
        else{
            flash('Operation failed')->error();
            return redirect()->route('consignee.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consignee $consignee)
    {
        $consignee->delete();
        flash('Consignee Deleted')->success();
        return response ()->json ();
    }

    public function allConsignees()
    {

        $consignees = Consignee::all();

        return Datatables::of($consignees)
            ->addColumn('action', function ($consignee) {
                if (Auth::user()->hasAnyPermission('Edit Consignee') && !Auth::user()->hasAnyPermission('Delete Consignee')){
                    return '<a href="'.route("transactions", ['id' => $consignee->id] ).'" class="btn btn-flat btn-success"><i class="glyphicon glyphicon-edit"></i> Transactions</a>'.'<a data-edit-consignee="'.$consignee->id.'" class="btn btn-flat btn-info edit_consignee"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                }
                if (Auth::user()->hasAnyPermission('Delete Consignee') && !Auth::user()->hasAnyPermission('Edit Consignee')){
                    return '<a href="'.route("transactions", ['id' => $consignee->id] ).'" class="btn btn-flat btn-success"><i class="glyphicon glyphicon-edit"></i> Transactions</a>'.'<a data-delete-consignee="'.$consignee->id.'"  class="btn btn-flat btn-danger  del_consignee"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
                }
                if (Auth::user()->hasAnyPermission('Delete Consignee') && Auth::user()->hasAnyPermission('Edit Consignee')){
                    return '<a href="'.route("transactions", ['id' => $consignee->id] ).'" class="btn btn-flat btn-success"><i class="glyphicon glyphicon-edit"></i> Transactions</a>'.'<a data-edit-consignee="'.$consignee->id.'" class="btn btn-flat btn-info edit_consignee"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                    '<a data-delete-consignee="'.$consignee->id.'"  class="btn btn-flat btn-danger  del_consignee"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
                }
            })
            ->make(true);
    }

    public function transactions(Consignee $consignee){
        return view('consignee.transactions', compact('consignee'));
    }

    public function allConsigeeSales(Consignee $consignee){
        $sales = Consignee::join('couriers', 'consignees.id', '=', 'consignee_id')
            ->select(DB::raw('consignees.id as id, couriers.id as courier_id, consignees.name as consignee_name, consignees.phone_number as phone, consignees.email as email, couriers.name as shipper, pickup_date, dispatch_date, delivery_date, payment_mode, amount'))
            ->where('consignees.id', '=', $consignee->id)
            ->get();

        return Datatables::of($sales)
            ->make(true);
    }
}
