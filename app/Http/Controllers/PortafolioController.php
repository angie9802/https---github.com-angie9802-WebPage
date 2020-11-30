<?php

namespace App\Http\Controllers;

use App\users;
use App\patientshh;
use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patientshhs = patientshh::all()->toArray();
        return view('portafolio', compact('patientshhs'));
    }

}
