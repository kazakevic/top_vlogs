@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            @foreach ($channels as $channel)

                <div class="panel panel-info">
                    <!-- Default panel contents -->
                    <div class="panel-heading"><a href="channel/{{$channel->id}}">{{$channel->title}}</a></div>
                    <div class="panel-body">
                        <p> {{ $channel->desc }}</p>
                    </div>
                </div>



            @endforeach
        </div>


        <div class="col-md-4">

            <div class="panel panel-info">
                <!-- Default panel contents -->
                <div class="panel-heading">Advertisements</div>
                <div class="panel-body">
                    <p>...</p>
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