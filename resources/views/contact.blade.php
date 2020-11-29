@extends('layout')
@section('title','Contact')



@section('content')

    <h1>Contact</h1>

    <form method="POST" action = "{{route('contact')}}">
        @csrf 
        <input name ="name" placeholder="Nombre..." value= "" ><br>
        {{$errors->first('name')}}
        <input type="email" name ="email" placeholder="Email..." value =""><br>
        {{$errors->first('email')}}
        <input name ="subject" placeholder="Asunto..." value = "importante"><br>
        <textarea name = "content" placeholder = "Mensaje..." >Te quiero</textarea><br>
        <button> Enviar </button>
    </form>

@endsection