@extends('layouts.app')

@section('content')

<div class="container">
    
      <!-- Search form -->
    <<form class="form-inline active-pink-3 active-pink-4" >
        <i class="fas fa-search" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
          aria-label="Search">
        <input type="submit"name="submit">
      </form>

    <form method="get">
    <label>Search</label>
    <input type="text"name="search">
    <input type="submit"name="submit">
    </form>
</div>


@endsection