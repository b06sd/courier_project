<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consignee;
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

        return redirect('/consignee');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function allConsignees()
    {

        $consignees = Consignee::all();

        return Datatables::of($consignees)
            ->addColumn('action', function ($consignee) {

                return '<a data-edit-consignee="'.$consignee->id.'" class="btn btn-flat btn-info 
                edit_consignee"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                '<a  data-delete-consignee="'.$consignee->id.'"  class="btn btn-flat btn-danger  del_consignee"><i class="glyphicon 
                glyphicon-edit"></i> Delete</a>';
            })
            ->make(true);
    }
}
