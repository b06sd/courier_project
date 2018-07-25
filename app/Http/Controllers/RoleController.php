<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        flash('Operation successful')->success();
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
//          return Role::join('role_has_permissions', 'roles.id', '=', 'role_has_permissions.role_id')
//            ->select(DB::raw('roles.*, permission_id'))
//            ->where('roles.id', '=', $role->id)
//            ->get();

        return Role::with('permissions')->where('roles.id', '=', $role->id)->get();
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
    public function update(Request $request, Role $role)
    {
        $validator = $this->validate($request, [
            'name'=>'bail|required|max:20|unique:roles,name,'.$role->id,
            'permissions' =>'required'
        ]);
        if(!($validator)){
            flash('Operation failed')->danger();
            return redirect()->route('roles.index');
        }
        else{
            $input = $request->except(['permissions']);
            $role->fill($input)->save();
            if($request->permissions <> ''){
                $role->permissions()->sync($request->permissions);
                flash('Operation successful')->success();
                return redirect()->route('roles.index');
            }
            else{
                flash('Operation failed')->danger();
                return redirect()->route('roles.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();
        flash('Operation successful')->success();
        return response ()->json ();
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
