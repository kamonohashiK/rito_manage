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
        $ITEMS_PER_PAGE = 30;
        $islands = Island::getAllForIndex()->paginate($ITEMS_PER_PAGE);

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
        $city_name = $this->cityName($island->cities);

        if ($island !== null) {
            return view('island.show', compact('island', 'city_name'));
        } else {
            abort(404);
        }
    }

    /**
     * 複数の市区町村名のうち、最初のもののみを返す
     */
    private function cityName($cities): string
    {
        if(count($cities) === 1) {
            return $cities->first()->name;
        } else {
            return $cities->first()->name . ' 他';
        }
    }
}
