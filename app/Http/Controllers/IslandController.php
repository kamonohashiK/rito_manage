<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IslandController extends Controller
{
    public function index()
    {
        return view('island.index');
    }
}
