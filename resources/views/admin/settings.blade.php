@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-2">

            <div class="sidebar-nav panel panel-default">
                <div class="panel-heading">Admin Menu</div>
                <div class="list-group">
                    <a href="{{url('/admin')}}" class="list-group-item"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                    <a href="#" class="list-group-item"><i class="glyphicon glyphicon-briefcase"></i> Channels
                        <i class="badge badge-info">{{$channels_count}}</i></a>
                    <a href="#" class="list-group-item"><i class="glyphicon glyphicon-user"></i> Users
                        <i class="badge badge-info">{{$users_count}}</i></a></a>
                    <div class="divider"></div>
                    <a href="#" class="list-group-item"><i class="glyphicon glyphicon-cog"></i> Settings</a>

                </div>
            </div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
            <form method="post" action="{{url('admin/updateSettings')}}">
            <div class="input-group">
                <span class="input-group" id="basic-addon1">Vote every (hours):</span>
                <input type="number" class="form-control" value="{{$vote_every}}" name="voteTime" />
                <input type="hidden" name="cfg_id" value="1" />
            </div>

            <br/>
            <div class="input-group">
                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-ok"></span> Update
                </button>
            </div>
            </form>
            <br/>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        </div>
    </div>

@stop
