<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $searchQuery = Form::select('email', 'mssv', 'luanvan', 'ten', 'sdt', 'ngay_muon')->get();
        return view('home', ['resultSearchQuery' => $searchQuery]);
    }
}
