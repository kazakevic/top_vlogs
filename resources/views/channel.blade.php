@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">

                <div class="panel panel-info">
                    <!-- Default panel contents -->
                    <div class="panel-heading">{{$channel_data->title}}<span class="label label-info pull-right">Votes: {{$channel_data->votes_count}}</span></div>
                    <div class="panel-body">
                        <p> {{ $channel_data->desc }}</p>

                        <form method="post" action="vote/{{$channel_data->id}}">
                            <div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>
                            <br/>
                            <button type="submit" class="btn btn-info">
                                <span class="glyphicon glyphicon-heart-empty"></span> Vote
                            </button>

                        </form>

                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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