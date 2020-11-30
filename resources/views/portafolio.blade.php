@extends('layout')
@section('title', 'Portafolio')


@section('content')

    <h1>Portafolio</h1>

    <table class="table ">
        <thead>
            <tr>
                <th scope="col">temperatura</th>
                <th scope="col">bpm</th>
                <th scope="col">ac_x</th>
                <th scope="col">ac_y</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($patientshhs as $row)
            <tr>
                <td>{{$row['temperatura']}}</td>
                <td>{{$row['bpm']}}</td>
                <td>{{$row['ac_x']}}</td>
                <td>{{$row['ac_y']}}</td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    

@endsection 