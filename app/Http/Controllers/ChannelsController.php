<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Channel;
use App\ApiService;
use Auth;

class ChannelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('vlogs');
    }

    public function addChannel()
    {
        return view('addChannel');
    }
    public function check(Request $request)
    {


        $api = new ApiService();

        $title = $request->input('title');
        $res = $api->getInfo($title);

        if(!$res)
            echo "0";
        else
        {
            $data = array();

//Check if objects exits in channel's json
            if (isset($res->{'description'}))
                $data['desc'] = $res->{'description'};
            else
                $data['desc'] = "";
            if (isset($res->{'thumbnails'}->{'default'}->{'url'}))
                $data['image'] = $res->{'thumbnails'}->{'default'}->{'url'};
            else
                $data['image'] = "noimage.png";
            if (isset($res->{'country'}))
                $data['country'] = $res->{'country'};
            else
                $data['country'] = "";

            echo json_encode($data, JSON_UNESCAPED_UNICODE);


        }
    }

    public function save(Request $request)
    {


        $this->validate($request, [
            'title' => 'required|unique:channels|max:255'
        ]);


        $channel = new Channel();
        $channel->title = $request->input('title');
        $channel->desc = $request->input('desc');
        $channel->image = $request->input('image');
        $channel->country = $request->input('country');
        $channel->owner_id = Auth::id();
        $channel->save();

        echo "ok";



    }
}
