<?php

namespace App\Models;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{
    use HasFactory;
    
    public static function get_depart($user_id)
    {
       $dept_id = User_role::where('user_id', $user_id)->first()->department;
        return $dept_id;
    }
    public static function get_depart_name($depart)
    {
       $depart_name = Department::where('id', $depart)->first()->department_name;
       return $depart_name;
    }
}
