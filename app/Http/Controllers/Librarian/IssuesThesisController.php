<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\IssuesThesis;
use Illuminate\Http\Request;

class IssuesThesisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $numberPaging = 4;
        $issuesTheses = IssuesThesis::join('users', 'issues_theses.user_id', '=', 'users.id')
                                    ->join('theses', 'theses.id', '=', 'issues_theses.thesis_id')
                                    ->select('issues_theses.issuesDate', 'issues_theses.id', 'issues_theses.expectedIssuesDate', 'issues_theses.returnDate', 'issues_theses.expectedReturnDate', 'users.name', 'users.email', 'users.phone', 'users.name', 'theses.nameVN')
                                    ->paginate($numberPaging);
        return view('librarian.index', ['issuesTheses' => $issuesTheses]);
    }

    protected function accept(Request $req)
    {
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
