@extends('layouts.app')
@section('title', 'Portfolio')

@section('corazon')
<a href="/menu">
    <img src="images/corazon.png">
</a>
@endsection

@section('pag_title','Portfolio')

@section('content')


    <div class="table-responsive-sm">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($user_patienthhs as $row)
           
            <tr> 
                <th scope="row">{{$row['id']}}</th>
                <td>{{$row['firstName']}}</td>
                <td>{{$row['lastName']}}</td>
                <td>{{$row['email']}}</td>
              
            </tr>
          
        @endforeach
        </tbody>
    </table>
    </div>

    
      

@endsection 