<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TOP video blogs</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                TOP video blogs
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">Home</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else

                    <a href="{{ url('/channel/add') }}"> <button type="button" class="btn btn-default navbar-btn btn-success ">Add Channel</button></a>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/ads/myAds') }}"><i class="glyphicon glyphicon-list-alt"></i> My Ads</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<script type="text/javascript">



    $('#check').click(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: './check',
            data: {title: $('#title').val()},
            success: function( res ) {
                if (res == 0)
                {
                    $(".channel_form").css("visibility", "hidden")
                    $('#info').html("");
                    $('#info').html("<div class='alert alert-info' role='alert'>Channel not found... :(</div>");
                }
                else
                {
                    $('#info').html("");
                    obj = JSON.parse(res);

                    $(".channel_form").css("visibility", "visible").hide().animate( { "opacity": "show", top:"100"} , 500 );
                    $("#desc").val(obj.desc);
                    $("#image").attr("src", obj.image);
                    $("#image1").val(obj.image);
                    $("#country1").html(obj.country);

                }
            }
        });

    });


    $('#save').click(function (e) {
        e.preventDefault();

        var title = $('#title1').val();
        var desc = $('#desc').val();
        var image = $('#image1').val();
        var country = $('#country').val();

        $.ajax({
            type: "POST",
            url: './save',
            data: { title: title,
                desc: desc,
                image: image,
                country: country
            },
            success: function( res1 ) {
                $("#info").html("<div class='alert alert-success' role='alert'>Channel saved!</div>");

            },
            error :function( jqXhr ) {
                if( jqXhr.status === 422 ) {
                    //process validation errors here.
                    $errors = jqXhr.responseJSON; //this will get the errors response data.
                    //show them somewhere in the markup
                    //e.g
                    errorsHtml = '<div class="alert alert-danger"><ul>';

                    $.each( $errors, function( key, value ) {
                        errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                    });
                    errorsHtml += '</ul></di>';

                    $( '#info' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form
                } else {
                    /// do some thing else
                }
            }




        });

    });

</script>
</body>
</html>
