<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Http\Requests\StoreFormRequest;

class FormController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numberPaging = 4;
        $searchQuery = Form::select('email', 'mssv', 'luanvan', 'ten', 'sdt', 'ngay_muon')->paginate($numberPaging);
        return view('home', ['resultSearchQuery' => $searchQuery]);
    }

    public function store(StoreFormRequest $request)
    {
        $form = new Form;
        $form->email = $request->email;
        $form->mssv = $request->mssv;
        $form->luanvan = $request->ma_lv;
        $form->ten = $request->name;
        $form->sdt = $request->phone;
        $form->ngay_muon = $request->date;
        $form->save();
        return back()->with('success', 'Bạn đã đăng kí thành công, vui lòng kiểm tra email để xác nhận');
    }
}
