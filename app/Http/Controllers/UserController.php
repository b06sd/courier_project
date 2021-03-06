<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Events\NewUser;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('users.index');
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required',
            'phone'=>'required|min:11'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        if($user){
            //trigger the event
            event(new NewUser($user));
            flash('Operation successful')->success();
        }
        else{
            flash('Operation failed')->danger();
        }
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Query\Builder
     */
    public function show(User $user)
    {

        //

        return User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select(DB::raw('users.id as id, users.name as name, email, phone, roles.name as rolename, roles.id as role_id'))
            ->where('users.id', '=', $user->id)
            ->first();

//        return DB::table('users')->where('id', '=', $user->id)->get();
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
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required',
            'phone'=>'required|min:11'
        ]);

        $input = $request->except('roles');
        $input['password'] = Hash::make($input['password']);

        $user->fill($input)->save();
        if ($request->roles <> '') {
            $user->roles()->sync($request->roles);
        }
        else {
            $user->roles()->detach();
        }
        flash('Operation successful')->success();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        flash('Operation successful')->success();
        return response ()->json ();
    }

    public function allUsers(){
        $users = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select(DB::raw('users.id as id, users.name as name, email, phone, roles.name as rolename'))
            ->get();

//        $users = User::all();

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                if (Auth::user()->hasAnyPermission('Edit User') && !Auth::user()->hasAnyPermission('Delete User')){
                    return '<a data-edit-user="'.$user->id.'" class="btn btn-xs btn-primary edit_user"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                }
                if (Auth::user()->hasAnyPermission('Delete User') && !Auth::user()->hasAnyPermission('Edit User')){
                    return '<a  data-delete-user="'.$user->id.'"  class="btn btn-xs btn-danger del_user"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
                }
                if (Auth::user()->hasAnyPermission('Delete User') && Auth::user()->hasAnyPermission('Edit User')){
                    return '<a data-edit-user="'.$user->id.'" class="btn btn-xs btn-primary edit_user"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                    '<a  data-delete-user="'.$user->id.'"  class="btn btn-xs btn-danger del_user"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
                }
//                return '<a data-edit-user="'.$user->id.'" class="btn btn-flat btn-info
//                edit_user"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
//                '<a  data-delete-user="'.$user->id.'"  class="btn btn-flat btn-danger  del_user"><i class="glyphicon
//                glyphicon-edit"></i> Delete</a>';
            })
            ->make(true);
    }
}
