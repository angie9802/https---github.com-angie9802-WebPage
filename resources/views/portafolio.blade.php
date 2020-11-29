@extends('layout')
@section('title', 'Portafolio')


@section('content')

    <h1>Portafolio</h1>

    <ul>
       
        @forelse ($portafolios as $portafolioItem)
            <li>{{ $portafolioItem['title'] }}</li>
            @empty 
            <li> No hay proyectos para mostrar</li>
        @endforelse
    </ul>

@endsection 