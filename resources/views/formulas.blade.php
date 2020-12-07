@extends('layouts.app')
@section('title', 'Formulas')

@section('corazon')
<a href="/menu">
    <img src="images/corazon.png">
</a>
@endsection

@section('pag_title','Formulas')


@section('content')

<div class="row justify-content-center">
<div class="card col-md-6 ">
    <div class="card-body">
        <div class="py-4">
            <form method="POST" action="{{ route('formulas.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="patient_id" class="col-md-4 col-form-label text-md-right">Patient ID: </label>

                    <div class="col-md-6">
                        <input id="patient_id" type="text" class="form-control" name="patient_id" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="medicine" class="col-md-4 col-form-label text-md-right">Medicine: </label>

                    <div class="col-md-6">
                        <input id="medicine" type="text" class="form-control" name="medicine">
                    </div>
                </div>

                
                <div class="form-group row">
                    <label for="dose" class="col-md-4 col-form-label text-md-right">Dose: </label>

                    <div class="col-md-6">
                        <input id="dose" type="text" class="form-control" name="dose">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="duration" class="col-md-4 col-form-label text-md-right">Treatment Duration: </label>

                    <div class="col-md-6">
                        <input id="duration" type="text" class="form-control" name="duration">
                    </div>
                </div>


                <div class="form-group d-flex justify-content-center ">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-danger mx-auto rounded-pill">
                        Submit
                        </button>
                    </div>
                </div>
            </form>
            @if (session('status'))
                <div>
                    <p class="text-center font-weight-bold">{{session('status')}}</p>
                </div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection