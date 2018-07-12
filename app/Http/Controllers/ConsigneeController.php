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
//        $users = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
//            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
//            ->select(DB::raw('users.id as id, users.name as name, email, phone, roles.name as rolename'))
//            ->get();
        $consignees = Consignee::all();

        return Datatables::of($consignees)
            ->addColumn('action', function ($consignee) {
//                if (Auth::user()->hasAnyPermission('Edit User') && !Auth::user()->hasAnyPermission('Delete User')){
//                    return '<a data-edit-user="'.$user->id.'" class="btn btn-xs btn-primary edit_user"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
//                }
//                if (Auth::user()->hasAnyPermission('Delete User') && !Auth::user()->hasAnyPermission('Edit User')){
//                    return '<a  data-delete-user="'.$user->id.'"  class="btn btn-xs btn-danger del_user"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
//                }
//                if (Auth::user()->hasAnyPermission('Delete User') && Auth::user()->hasAnyPermission('Edit User')){
//                    return '<a data-edit-user="'.$user->id.'" class="btn btn-xs btn-primary edit_user"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
//                    '<a  data-delete-user="'.$user->id.'"  class="btn btn-xs btn-danger del_user"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
//                }
                return '<a data-edit-user="'.$consignee->id.'" class="btn btn-flat btn-info 
                edit_user"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                '<a  data-delete-user="'.$consignee->id.'"  class="btn btn-flat btn-danger  del_user"><i class="glyphicon 
                glyphicon-edit"></i> Delete</a>';
            })
            ->make(true);
    }
}
