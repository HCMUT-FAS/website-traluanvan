<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\luanvanAvailable;
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
        // $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function index()
    {
        /*
            Liên kết ma_;v của table Forms sang ma_lv của table luanvan_availables
        */
        $numberPaging = 4;
        $form = Form::join('luanvan_availables', 'forms.luanvan', '=', 'luanvan_availables.ma_lv')
                    ->join('luanvans', 'luanvans.ma_lv', '=', 'forms.luanvan')
                    ->select('luanvans.ten_lv','forms.ten', 'forms.email', 'forms.mssv', 'forms.luanvan', 'forms.ngay_muon', 'forms.sdt', 'luanvan_availables.available')
                    ->paginate($numberPaging);
        return view('home', ['formShowRequest' => $form]);
    }

    public function store(StoreFormRequest $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $form = new Form;
        $form->email = $request->email;
        $form->mssv = $request->mssv;
        $form->luanvan = $request->ma_lv;
        $form->ten = $request->name;
        $form->sdt = $request->phone;
        $form->ngay_muon = $request->date;
        $form->created_at = date('Y-m-d H:i:s');
        $form->save();
        return back()->with('success', 'Bạn đã đăng kí thành công, vui lòng kiểm tra email để xác nhận');
    }

    protected function accept(Request $req)
    {
        /*
        ma_lv: nay la cua form, chu khong phai luanvanAvailable
        */ 
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $notAvailable = 0;
        $update = new luanvanAvailable;
        $update = luanvanAvailable::where('ma_lv', $req->ma_lv)->update(['available' => $notAvailable]);
        return back()->with('success', 'Cho mượn thành công!');

    }

    protected function decline(Request $req)
    {
        $delete = Form::where('luanvan', $req->ma_lv)->delete();
        return back()->with('success', 'Xóa đơn thành công');
    }

    protected function return(Request $req)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $available = 1;
        $update = new luanvanAvailable;
        $update = luanvanAvailable::where('ma_lv', $req->ma_lv)->update(['available' => $available]);
        // Update xong xóa form
        $delete = Form::where('luanvan', $req->ma_lv)->delete();
        return back()->with('success', 'Trả lại thành công');
    }
}
