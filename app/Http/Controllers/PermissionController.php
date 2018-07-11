<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Permission;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    public function index(){
        return view('permissions.index');
    }

    public function show(Permission $permission){
//        return view('permissions.show', compact('permission'));
        return response()->json($permission);
    }

    public function create(){
        $roles = Role::get();
        return view('permissions.create', compact('roles'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $permission = new Permission();
        $permission->name = $request->name;
//        $permission->guard_name = 'App\User';
        $permission->save();
        if ($request->roles <> '') {
            foreach ($request->roles as $key=>$value) {
                $role = Role::find($value);
                $role->permissions()->attach($permission);
            }
        }
        flash('Operation successful')->success();
        return redirect()->route('permissions.index');
    }

    public function edit(Permission $permission){
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission){
        $this->validate($request, [
            'name'=>'required|max:40'
        ]);
        $update = Permission::where('id', $permission->id)->update([
            'name'=> $request->name,
        ]);

        if($update){
            flash('Operation successful')->success();
            return redirect()->route('permissions.index');

        }
        else{
            flash('Operation failed')->error();
            return redirect()->route('permissions.index');
        }
    }

    public function destroy(Permission $permission)
    {
        $delete =  $this->model->delete($permission->id);

        if($delete){
            flash('Operation successful')->success();
            return redirect()->route('permissions.index');
        }
        else{
            flash('Operation failed')->error();
            return redirect()->route('permissions.index');
        }
    }

    public function getAllPermissions(){
        $permission = Permission::select('id', 'name')->get();
        return Datatables::of($permission)
            ->addColumn('action', function ($permission) {
//                if (Auth::user()->hasAnyPermission('Edit Permission') && !Auth::user()->hasAnyPermission('Delete Permission')){
//                    return '<a data-edit-permission="'.$permission->id.'" class="btn btn-xs btn-primary edit_permission"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
//                }
//                if (Auth::user()->hasAnyPermission('Delete Permission') && !Auth::user()->hasAnyPermission('Edit Permission')){
//                    return '<a  data-delete-permission="'.$permission->id.'"  class="btn btn-xs btn-danger del_permission"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
//                }
//                if (Auth::user()->hasAnyPermission('Delete Permission') && Auth::user()->hasAnyPermission('Edit Permission')){
//                    return '<a data-edit-permission="'.$permission->id.'" class="btn btn-xs btn-primary edit_permission"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.'<a  data-delete-comp="'.$permission->id.'"  class="btn btn-xs btn-danger del_permission"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
//                }
                return '<div class="input-group-flat btn-group"><a data-edit-permission="'.$permission->id.'" class="btn btn-info edit_permission"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.'<a  data-delete-comp="'.$permission->id.'"  class="btn btn-danger del_permission"><i class="glyphicon glyphicon-edit"></i> Delete</a></div>';
            })
            ->make(true);
    }

}
