<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use App\Channel;
use App\Vote;
use App\ApiService;
use Auth;
use Illuminate\Pagination\Paginator;
use App\User;

use App\Captcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ChannelsController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {
        $data = Array();
        $data['channels'] = Channel::where('status', 0)->orderBy('votes_count', 'desc')->paginate(5);
        $data['users'] = User::all();
        return view('vlogs', $data);
    }

    public function addChannel()
    {
        return view('addChannel');
    }
    public function check(Request $request)
    {
        //using youtube API class to get channel info
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
        $desc= $request->input('desc');
        $channel->desc = htmlentities($desc);
        $channel->image = $request->input('image');
        $channel->country = $request->input('country');
        $channel->owner_id = Auth::id();
        $channel->save();

        echo "ok";

    }

    public function showChannel($id)
    {
        $data = Array();
        $data['channel_data'] = Channel::find($id);
        return view('channel', $data);
    }
    public function vote($id)
    {
        if(Captcha::captchaCheck() == false)
        {
            return redirect()->back()
                ->withErrors(['Wrong Captcha'])
                ->withInput();
        }

        if (!$this->voteCheck())
        {
            return redirect()->back()
                ->withErrors(['You alredy voted. You can vote only once per 24 hours.'])
                ->withInput();
        }

        $channel = Channel::find($id);
        $channel->votes_count += 1;
        $channel->save();

        $request = new Request();
        $vote = new Vote();
        $vote->ip = $request->ip();
        $vote->save();

        return redirect("/channel/$id");
    }

    private function voteCheck()
    {
        $request = new Request();
        $ip = $request->ip();

        $rows = Vote::where('ip', $ip)->count();
        if($rows > 0)
        {
            //now we need to check if last vote time is less or greater thant N
            $q = Vote::where('ip', $ip)->first();
            print_r($q);

            $vote_time = $q->created_at;
            $difference = (time() - strtotime($vote_time))/3600;
            if($difference < 24)
            {
                return false;
            }
            else
            {
                $q->delete();
                return true;
            }
        }
        else
            return true;
    }

    public function myChannels()
    {
        $data = Array();
        $data['channels'] = Channel::where('owner_id', Auth::user()->id)->orderBy('votes_count', 'desc')->get();

        return view('my_channels', $data);
    }
    public function editMyChannel($id)
    {
        //check if it's owner of this channel
        $q = Channel::where('id', $id)->first();
        if($q->owner_id != Auth::user()->id)
        {
            echo "You are not owner of this channel!";
            return;
        }

        $data = Array();
        $data['channel_data'] = Channel::where('id', $id)->first();
        return view('my_channel_edit', $data);
    }
    public function updateMyChannel($id, Request $request)
    {
        //check if it's owner of this channel
        $q = Channel::where('id', $id)->first();
        if($q->owner_id != Auth::user()->id)
        {
            echo "You are not owner of this channel!";
            return;
        }

        $this->validate($request, [
            'title' => 'required|unique:channels|max:255',
            'desc' => 'required|min:50',
        ]);

        $channel = Channel::where('id', $id)->first();
        $channel->title = $request->input('title');
        $channel->desc = $request->input('desc');
        $channel->save();

        return redirect('/my_channels');
    }

    public function deleteMyChannel($id)
    {
        $channel = Channel::where('id', $id)->first();
        $channel->delete();
        return redirect('/my_channels');
    }


}
