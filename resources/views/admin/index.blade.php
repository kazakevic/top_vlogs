@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-2">

            <div class="sidebar-nav panel panel-default">
                <div class="panel-heading">Admin Menu</div>
                <div class="list-group">
                    <a href="#" class="list-group-item"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                    <a href="#" class="list-group-item"><i class="glyphicon glyphicon-envelope"></i> Channels <i
                                class="badge badge-info">4</i></a>
                    <a href="#" class="list-group-item"><i class="glyphicon glyphicon-user"></i> Users</a>
                    <div class="divider"></div>
                    <a href="#" class="list-group-item"><i class="glyphicon glyphicon-comment"></i> Settings</a>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <canvas id="channels" width="400px" height="200px"></canvas>
            <canvas id="users" width="400px" height="200px"></canvas>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.min.js"></script>

        <script>
            $( document ).ready(function() {
                $.getJSON("charts/channels", function (result) {
                    var labels = [],data=[];
                    for (var i = 0; i < result.length; i++) {
                        labels.push(result[i].month);
                        data.push(result[i].channels);
                    }

                    var ctx = document.getElementById("channels");
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: '#New Channels',
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                data: data
                            }]
                        }
                    });
                });

                $.getJSON("charts/users", function (result) {
                    var labels = [],data=[];
                    for (var i = 0; i < result.length; i++) {
                        labels.push(result[i].date);
                        data.push(result[i].users);
                    }

                    var ctx = document.getElementById("users");
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: '#New Users',
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                data: data
                            }]
                        }
                    });
                });



            });
        </script>
        </div>
    </div>

@stop
