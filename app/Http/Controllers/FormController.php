<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Http\Requests\StoreFormRequest;

class FormController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return back()->with('success', 'Bạn đã đăng kí đơn thành công, vui lòng kiểm tra email để xác nhận');
    }
}
