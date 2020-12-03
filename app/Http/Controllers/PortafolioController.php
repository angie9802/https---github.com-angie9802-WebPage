<?php

namespace App\Http\Controllers;

use App\users;
use App\user_patienthh;
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
        $user_patienthhs = user_patienthh::all()->toArray();
        return view('portafolio', compact('user_patienthhs'));
    }

}
