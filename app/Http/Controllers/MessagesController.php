<?php

namespace App\Http\Controllers;
use App\formula;


class MessagesController extends Controller
{

    public function index()
    {
        return view('formulas');
    }

    public function store(){
        request()->validate([
            'name' => 'required',
            'email' => 'required'

        ]);

   

        return "datos validados";
    }
}
