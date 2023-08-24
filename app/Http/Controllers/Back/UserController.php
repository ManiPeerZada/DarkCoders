<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u = User::get();
        return view('back.user.index', compact('u'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(Request $request)
    {
        $get_rol_id = Role::where('role',$request->role)->first()->id;
        $user = new User();
        $user->name = $request->heading;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = $request->type;
        $user->status = 'Active';
        $user->role = $get_rol_id;
        $user->save();
        return redirect('manage-users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {
        $get_rol_id = Role::where('role',$request->role)->first()->id;
        if ($request->password == '') {
            $upd_user = User::where('id', $request->e_id)->first();
            $upd_user->name = $request->name;
            $upd_user->email = $request->email;
            $upd_user->type = $request->type;
            $upd_user->role = $get_rol_id;
            $qry =  $upd_user->save();
            if ($qry === True) {
                echo '1';
            } else {
                echo '0';
            }
        } else {
            $upd_user = User::where('id', $request->e_id)->first();
            $upd_user->name = $request->name;
            $upd_user->email = $request->email;
            $upd_user->password = Hash::make($request->password);
            $upd_user->type = $request->type;
            $upd_user->role = $get_rol_id;
            $qry =  $upd_user->save();
            if ($qry === True) {
                echo '1';
            } else {
                echo '0';
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del_rol = User_role::where('user_id',$id)->delete();
        if($del_rol == true){
            $del = User::where('id', $id)->delete();
        
            return redirect('manage-users')->with('message','User Deleted Successfully');
        }
        
    }

    public function update_sts(Request $request, $id)
    {
        if ($id == '') {
            echo 'error';
            return;
        }

        $status = $request->sts;
        if ($status == '') {
            echo 'invalid current status provided.';
            return;
        }
        if ($status == 'Active')
            $new_status = 'Block';
        else
            $new_status = 'Active';

        $msr_sts = User::find($id);
        $msr_sts->status = $new_status;
        $msr_sts->save();
        echo $new_status;
        return;
    }
}
