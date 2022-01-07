<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Thesis;
use Illuminate\Http\Request;
use Auth;
use App\Models\IssuesThesis;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Gate;

class IssuesThesisController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $numberPaging = 4;
        $issuesTheses = IssuesThesis::join('users', 'issues_theses.user_id', '=', 'users.id')
                                    ->join('theses', 'theses.id', '=', 'issues_theses.thesis_id')
                                    ->select('issues_theses.issuesDate', 'issues_theses.id', 'issues_theses.expectedIssuesDate', 'issues_theses.returnDate', 'issues_theses.expectedReturnDate', 'users.name', 'users.email', 'users.phone', 'users.name', 'theses.nameVN')
                                    ->whereNull('returnDate')
                                    ->where('users.id', '=', $user->id)
                                    ->paginate($numberPaging);
        return view('student.index', ['issuesTheses' => $issuesTheses]);
    }

    public function search(SearchRequest $req)
    {
        $numberPaging = 10;
        $searchQuery = Thesis::where('nameVN', 'like', '%' . $req->search . '%')
                            ->orwhere('intructor1', 'like', '%' . $req->search . '%')
                            ->orwhere('intructor2', 'like', '%' . $req->search . '%')
                            ->paginate($numberPaging);
        $searchQuery->appends($req->all());
        return view('luanvan.luanvan-list', ['resultSearchQuery' => $searchQuery]);
    }

    public function show(Request $request)
    {   
        $thesis = thesis::where('id', '=', $request->id)->get();
        return view('luanvan.luanvan-show', ['theses' => $thesis]);
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $form = new IssuesThesis;
        $form->thesis_id = $request->thesis_id;
        $form->user_id = $request->user_id;
        $form->expectedIssuesDate = $request->expected_date;
        $form->save();
        return back()->with('success', 'Bạn đã đăng kí thành công, vui lòng kiểm tra email để xác nhận');
    }
}
