<?php

namespace App;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiService
{
    //
    public function getInfo($channel)
    {
        $url = "https://www.googleapis.com/youtube/v3/channels?key=AIzaSyC0ZnCrmCEcMw8vv5fSH0QR99R8xzXthbM&forUsername=".$channel."&part=snippet";
        $json = file_get_contents($url);
        $obj = json_decode($json);

        //return $obj->{'items'}{'0'}->{'snippet'};
        if(!empty(array_filter($obj->{'items'})))
            return $obj->{'items'}{'0'}->{'snippet'};
        else
            return false;
    }
}
