<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roles.index');
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
        $this->validate($request, [
            'name' => 'required|unique:roles|max:10',
            'permissions' => 'required'
        ]);

        $user = Role::create($request->except('permissions'));
        if($request->permissions <> ''){
            $user->permissions()->attach($request->permissions);
        }
//        flash('Operation successful')->success();
        return redirect()->route('roles.index');
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

    public function allRoles()
    {
        $roles = Role::all();

        return Datatables::of($roles)
            ->addColumn('permissions', function ($role) {
                return str_replace(array('[',']','"'),'', $role->permissions()->pluck('name'));
            })
            ->addColumn('action', function ($role) {
                return '<a data-edit-role="'.$role->id.'" class="btn btn-flat btn-info 
                edit_role"><i class="glyphicon glyphicon-role"></i> Edit</a>'.
                '<a  data-delete-role="'.$role->id.'"  class="btn btn-flat btn-danger  del_role"><i class="glyphicon 
                glyphicon-edit"></i> Delete</a>';
            })
            ->make(true);
    }
}
