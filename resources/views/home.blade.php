@extends('layouts.app')

@section('content')

<div class="container">
    
        <div class="row justify-content-center">
            <div class="col-md-4 mx-auto" style="margin-top: 15%">
                <img src="logo.jpeg"/>
            </div>
            <div class="col-md-8">
                <div >
                    <p class="mx-auto" style="font-size:2.5rem">Medical formulation and vital signs monitoring system</p>
                </div>   
                <div  class="mx-auto py-3">
                    <p class="my-2">Press here to see your patient status</p>
                    <a type="submit" class="btn btn-outline-danger btn-block rounded-pill" href="{{ route('login') }}">
                        {{ __('Login') }}</a>
                </div> 
                <div  class="mx-auto">
                   
                    <p class="my-2">If you don't have an account, press here to register</p>
                    @if (Route::has('register'))
                    <a type="submit" class="btn btn-outline-danger btn-block rounded-pill" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                    @endif
                </div> 
            </div>
        </div>
  
</div>
@endsection
