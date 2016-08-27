@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-6">


  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Check form -->
    <div class="check_form">
    <form action="" method="post">
       <div class="form-group">
        <label for="title">Title:</label>
        <input type="title" class="form-control" id="title" placeholder="Channel title">
      </div>
      <div class="form-group">
        <input type="submit" value="check" id="check" class="btn btn-success"/>
      </div>
        <div id="load"><img src="{{asset('img/morph-shape-gif-preloader.gif')}}" id="loading" style="visibility: hidden"/></div>
    </form>
  </div>
  <br/>
  <div id="info">
  </div>



<!-- Second form -->

<div class="channel_form" style="visibility:hidden">
  <form action="" method="post">
   <div class="form-group">
    <label for="title1">Title:</label>
    <input type="text" class="form-control" name="title1" id="title1" placeholder="Title">
  </div>

  <div class="form-group">
    <label for="desc">Description:</label>
    <textarea class="form-control" rows="3" name="desc" id="desc" placeholder="Channel Description"></textarea>
  </div>

  <div class="form-group">
    <img src="" id="image" alt="" class="img-thumbnail" id="image" />
  </div>
  <input type="hidden" name="image" value="noimage.png" id="image1" />


  <div class="form-group ">
    <label for="country">Country:</label>
    <div class="well well-sm" id="country1"> </div>
    <input type="hidden" class="form-control" id="country" name="country">
  </div>

  <input type="submit" value="Add channel" id="save" class="btn btn-success"/>
</form>
</div>

</div>

<!-- row -->
</div>




@stop