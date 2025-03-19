@extends('Superheroe.layout')

@section('content')

<br><br>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Create new superhero</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('Superheroe.index') }}">Back</a>
        </div>
    </div>

</div>


<form action="{{ route('superhero.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                
                <strong>Hero Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Hero name">
                <br>
                <strong>Real Name:</strong>
                <input type="text" name="real_name" class="form-control" placeholder="Hero name">
                <br>
                <strong>Hero Image:</strong>
                <input type="file" name="hero_image">
                <br>
                <strong>Hero Details:</strong>
                <textarea class="form-control" name="details" style="width: 450px " placeholder="Your hero's details"> </textarea>

                <br><br>
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

            
        </div>




    </div>

</form>


@endsection