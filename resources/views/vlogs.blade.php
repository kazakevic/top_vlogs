@extends('layouts.app')

@section('content')

    <?php
    $usr = array();
    foreach ($users as $user) {
        $usr[$user->id] = $user->name;
    }
    ?>

    <div class="row">
        <div class="col-md-6">
            @foreach ($channels as $channel)

                <div class="panel panel-info">
                    <!-- Default panel contents -->


                    <div class="panel-heading">
                        <a href="channel/{{$channel->id}}">{{$channel->title}}</a>
                        <span class="label label-info pull-right">Votes: {{$channel->votes_count}}</span></div>
                    <div class="panel-body">

                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img class="media-object" src="{{$channel->image}}" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">{{ mb_substr($channel->desc, 0, 150) }} [...]</h5>
                                <a href="channel/{{$channel->id}}">Read full description</a>
                            </div>
                            <br/>
                            <span class="label label-default">Posted: {{$channel->created_at->format('Y m d')}}</span>
                            <span class="label label-default">Posted by: {{$usr[$channel->owner_id]}}</span>
                        </div>


                    </div>
                </div>

            @endforeach
            <div class="col-md-6">
                {{ $channels->links() }}
            </div>
        </div>


        <div class="col-md-4">
            <div class="panel panel-info">
                <!-- Default panel contents -->
                <div class="panel-heading">Categories</div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($categories as $cat)
                            <a href="{{url('channels/cat/'.$cat->id)}}">
                                <li class="list-group-item">
                                    <b>{{$cat->cat_name}}</b>
                                    <!-- <span class="badge">14</span> -->
                                </li>
                            </a>
                        @endforeach
                    </ul>


                </div>
            </div>
            <div class="panel panel-info">
                <!-- Default panel contents -->
                <div class="panel-heading">Our friends</div>
                <div class="panel-body">
                    <p>...</p>
                </div>
            </div>

        </div>


    </div>




@stop