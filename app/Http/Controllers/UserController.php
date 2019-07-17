<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DataTables;

class UserController extends Controller
{

    public function __construct()
    {
        View::share('main_menu', 'user');
    }

    public function index()
    {
        return view('users.users');
    }

    public function loadUserList(Request $request)
    {
        $role_id = $request->roleId;
        $user_list = User::with()->where('is_superuser',0);

        if(!empty($role_id)) {
            $user_list = $user_list->where('role_id',$role_id);
        }


        $data = array();
        $index = 1;
        foreach ($user_list as $user){
            $single_row = array();
            array_push($single_row,$index);
            array_push($single_row,$user->first_name." " . $user->last_name);
            array_push($single_row,$user->userid);
            array_push($single_row,$user->email);
            array_push($single_row,$user->created_at);

            array_push($data,$single_row);
            $index++;
        }
        return json_encode(array('data'=>$data));
    }



}
