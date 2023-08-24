<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_role;
use App\Models\User;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u_role = User_role::get();
        return view('back.user.assign_role', compact('u_role'));
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
        $user = $request->user;
        if ($user != null || $user != "") {
            $get_user_id = User::where('name', $user)->first()->id;
            if (User_role::where('user_id', $get_user_id)->exists()) {
                $upd_user_role = User_role::where('user_id', $get_user_id)->first();
                $upd_user_role->user_id = $get_user_id;
                $upd_user_role->manage_pricing = $request->pricing;
                $upd_user_role->manage_files = $request->mfiles;
                $upd = $upd_user_role->save();
                if ($upd) {
                    return 'u';
                } else {
                    return 'e';
                }
            } else {
                if ($get_user_id != null || $get_user_id != '') {
                    $ins_user_role = new User_role();
                    $ins_user_role->user_id = $get_user_id;
                    $ins_user_role->manage_pricing = $request->pricing;
                    $ins_user_role->manage_files = $request->mfiles;
                    $qry = $ins_user_role->save();
                    if ($qry) {
                        return '1';
                    } else {
                        return '0';
                    }
                } else {
                    return '0';
                }
            }
        }else{
            return '0';
        }
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
}
