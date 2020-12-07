@extends('layouts.app')
@section('title', 'Portfolio')

@section('corazon')
<a href="/menu">
    <img src="images/corazon.png">
</a>
@endsection

@section('pag_title','Portfolio')

@section('content')
  
<input class="form-control" id="myInput" type="text" placeholder="Insert the name">
<br>
    <div class="table-responsive-sm">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">ID machine</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody id="myTable">
        @foreach ($user_patienthhs as $row)
           
            <tr> 
                <th scope="row">{{$row['machine_ID']}}</th>
                <td>{{$row['firstName']}}</td>
                <td>{{$row['lastName']}}</td>
                <td>{{$row['email']}}</td>
              
            </tr>
          
        @endforeach
        </tbody>
    </table>
    </div>

    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    </script>
    
      

@endsection 