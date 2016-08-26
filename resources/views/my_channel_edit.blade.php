@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">

        <h4>Channel information:</h4>

        <form method="post" action="{{url("my_channel/update/".$channel_data->id)}}">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Title:</span>
            <input type="text" class="form-control" value="{{ $channel_data->title }}" name="title" />
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Desc.:</span>
            <textarea class="form-control" name="desc" rows="10">{{$channel_data->desc}}</textarea>
        </div>
        <br/>
            <div class="input-group">
                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-ok"></span> Update
                </button>
            </div>
        </form>
        <br/>
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