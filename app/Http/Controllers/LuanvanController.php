<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luanvan;
use App\Models\luanvanAvailable;
use App\Http\Requests\SearchRequest;


class LuanvanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Check Request
    // https://youtu.be/FJDQBkS1Fqw?t=9122
    public function search(SearchRequest $req)
    {
        $numberPaging = 10;
        $searchQuery = Luanvan::where('ten_lv', 'like', '%' . $req->search . '%')
                            ->orwhere('ten_gv1', 'like', '%' . $req->search . '%')
                            ->orwhere('ten_gv2', 'like', '%' . $req->search . '%')
                            ->paginate($numberPaging);
        $searchQuery->appends($req->all());
        return view('luanvan.luanvan-list', ['resultSearchQuery' => $searchQuery]);
    }

    public function show($name, $id)
    {   
        $show = Luanvan::where('ma_lv', '=', $id)->get();
        $available = luanvanAvailable::where('ma_lv', '=', $id)->get();
        return view('luanvan.luanvan-show', ['resultShowQuery' => $show, 'availableQuery' => $available]);
    }
}