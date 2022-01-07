<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\IssuesThesis;
use Illuminate\Http\Request;
use Auth;
use Mail;
use Illuminate\Support\Facades\Gate;
class IssuesThesisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Gate::allows('librarian-view')) {
            $numberPaging = 4;
            $issuesTheses = IssuesThesis::join('users', 'issues_theses.user_id', '=', 'users.id')
                                        ->join('theses', 'theses.id', '=', 'issues_theses.thesis_id')
                                        ->whereNull('returnDate')
                                        ->select('issues_theses.issuesDate', 'issues_theses.id', 'issues_theses.expectedIssuesDate', 'issues_theses.returnDate', 'issues_theses.expectedReturnDate', 'users.name', 'users.email', 'users.phone', 'users.name', 'theses.nameVN')
                                        ->paginate($numberPaging);
            return view('librarian.index', ['issuesTheses' => $issuesTheses]);
        }else {
            abort(403);
        }
    }

    protected function accept(Request $req)
    {
        $user = Auth::user();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDate = date("Y-m-d");
        $returnDate = date('Y-m-d', strtotime("+2 weeks"));
        $update = IssuesThesis::where('id', '=', $req->issues_thesis_id)
                                ->update([
                                    'issuesDate' => $currentDate,
                                    'expectedReturnDate' => $returnDate
                                ]);
        return back()->with('success', 'Cho mượn thành công!');
    }

    protected function decline(Request $req)
    {
        $delete = IssuesThesis::where('id', $req->issues_thesis_id)->delete();
        return back()->with('success', 'Xóa đơn thành công');
    }

    protected function return(Request $req)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDate = date("Y-m-d");
        $update = IssuesThesis::where('id', '=', $req->issues_thesis_id)
                                ->update(['returnDate' => $currentDate]);
        return back()->with('success', 'Trả lại luận văn thành công!');
    }
}
