<?php

namespace App\Http\Controllers;

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
        $islands = Island::getAllForIndex()->paginate(30);
        return view('island.index', compact('islands'));
    }

    /**
     * 島の詳細画面を表示する
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show(int $id): \Illuminate\View\View
    {
        $island = Island::find($id);
        if ($island !== null) {
            return view('island.show', compact('island'));
        } else {
            abort(404);
        }
    }
}
