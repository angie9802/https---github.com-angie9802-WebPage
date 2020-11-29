<?php

namespace App\Http\Controllers;

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
        $portafolios = [
            ['title' => 'Proyectos#1'],
            ['title' => 'Proyectos#2'],
            ['title' => 'Proyectos#3'],
            ['title' => 'Proyectos#4'],
        ];
        return view('portafolio',compact('portafolios'));
    }

}
