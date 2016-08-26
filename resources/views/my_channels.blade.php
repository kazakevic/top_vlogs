@extends('layouts.app')

@section('content')

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
                        </div>
                        <br/>
                        <a href="my_channel/edit/{{$channel->id}}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <button type="submit"data-href="my_channel/delete/{{$channel->id}}" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">Delete</button>
                        <br/>
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

    <!-- Modal -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Confirm to delete channel
                </div>
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>


@stop