@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">


                <div class="panel panel-info">
                    <!-- Default panel contents -->
                    <div class="panel-heading">{{$channel_data->title}}</div>
                    <div class="panel-body">
                        <p> {{ $channel_data->desc }}</p>
                    </div>
                </div>

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