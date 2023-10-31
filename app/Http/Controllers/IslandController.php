<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Island;

class IslandController extends Controller
{
    /**
     * 島の一覧画面を表示する
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $islands = Island::getAll();
        return view('island.index', compact('islands'));
    }
}
