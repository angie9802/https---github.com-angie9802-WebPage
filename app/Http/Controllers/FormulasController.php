<?php

namespace App\Http\Controllers;
use App\formula;
use Illuminate\Http\Request;

class FormulasController extends Controller
{

    public function index()
    {
        return view('formulas');
    }

    public function store(Request $request)
    {
        
     formula::create([
            'patient_id' => request('patient_id'),
            'medicine' => request('medicine'),
            'dose' => request('dose'),
            'duration' => request('duration')
        ]);

        return back()->with('status','The formula has been uploaded successfully');
        
    }

}
