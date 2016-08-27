<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Channel;
use App\User;
use App\SystemSetting;
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
    public function settings()
    {
        //check if user have acces to admin page
        $user = Auth::user();
        if($user->name != "admin")
        {
            return redirect("/home");
        }
        $data = Array();

        $cfg = SystemSetting::where('id', 1)->first();
        $data['channels_count'] = Channel::all()->count();
        $data['users_count'] = User::all()->count();
        $data['vote_every'] = $cfg->cfg_value;

        return view('admin.settings', $data);
    }
    public function updateSettings(Request $request)
    {

        $id = $request->input('cfg_id');

        $cfg = SystemSetting::where('id', $id)->first();
        $cfg->cfg_value = $request->input('voteTime');
        $cfg->save();

        return redirect(url('admin/settings'))->with('status', 'Settings updated!');
    }
}
