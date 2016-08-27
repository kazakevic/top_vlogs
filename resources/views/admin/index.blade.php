@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-2">

            <div class="sidebar-nav panel panel-default">
                <div class="panel-heading">Admin Menu</div>
                <div class="list-group">
                    <a href="admin" class="list-group-item"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
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
            <canvas id="channels" width="400px" height="200px"></canvas>
            <canvas id="users" width="400px" height="200px"></canvas>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.min.js"></script>
            <script src="{{URL::asset('js/charts.js')}}"></script>

        </div>
    </div>

@stop
