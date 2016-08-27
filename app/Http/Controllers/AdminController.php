<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Channel;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        //adminas@test.lt
        //admin123
        //check if user have acces to admin page
        $user = Auth::user();

        if($user->name != "admin")
        {
            return redirect("/home");
        }


        $data = Array();
        $data['channels_count'] = Channel::all()->count();
        $data['users_count'] = User::all()->count();

        return view('admin/index', $data);
    }
}
