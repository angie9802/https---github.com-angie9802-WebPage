<?php

namespace App\Http\Controllers;

use App\users;
use App\data_patienthh;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.e
     *
     * @return \Illuminat\Http\Response
     */
    public function index()
    {
        $data_patienthhs = data_patienthh::all()->toArray();
        return view('contact', compact('data_patienthhs'));
    }

}
?>