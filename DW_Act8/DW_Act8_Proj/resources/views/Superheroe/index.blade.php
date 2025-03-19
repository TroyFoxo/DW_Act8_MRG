@extends('Superheroe.layout')

@section('content')

<br><br>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Superhero Info:</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('create.superhero') }}">New Hero</a>
        </div>
    </div>
</div>


    @if($message = Session::get('success'))

    <div class="alert alert-success"><p>{{ $message }} <p></div>

    @endif


    <table class="table table-bordered">

        <tr>
            <th> Name </th>
            <th> Real Name </th>
            <th width="300px"> Image </th>
            <th> Details </th>
            <th> Action </th>
        

        </tr>

        @foreach($superheroe as $sh)
        <tr>
            
            <td>{{ $sh->name }} </td>
            <td>{{ $sh->real_name }} </td>
            <td> <img src="{{ URL::to($sh->hero_image) }}" height="250px"> </td>
            <td>{{ $sh->details }}</td>
            <td>
                
                <a class="btn btn-info" href="">SHOW</a>
                <a class="btn btn-primary" href="{{ URL::to('edit/superhero/'.$sh->id) }}">EDIT</a>
                <a class="btn btn-danger" href="{{ URL::to('delete/superhero/'.$sh->id) }}" onclick="return confirm('Are u sure?')">DELETE</a>

            </td>
            
        <tr>
        @endforeach

</tr>

    </table>



</div>




@endsection