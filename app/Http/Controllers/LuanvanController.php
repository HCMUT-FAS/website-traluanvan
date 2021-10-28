<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luanvan;


class LuanvanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $req)
    {
        $numberPaging = 15;
        $luanvans = Luanvan::where('ten_lv', 'like', '%' . $req->search . '%')
                                        ->orwhere('ten_gv1', 'like', '%' . $req->search . '%')
                                        ->orwhere('ten_gv2', 'like', '%' . $req->search . '%')
                                        ->paginate($numberPaging);
        return view('luanvan.luanvan-list', ['luanvans' => $luanvans]);
    }
}