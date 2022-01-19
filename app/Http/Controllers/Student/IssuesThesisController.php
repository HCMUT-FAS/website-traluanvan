<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormStoreRequest;
use App\Models\Thesis;
use Illuminate\Http\Request;
use App\Models\IssuesThesis;
use App\Http\Requests\SearchRequest;
use App\Jobs\StudentIssuesSuccess;
use App\Jobs\Success;
use App\Mail\IssuesSuccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $searchQuery = Thesis::join('theses_status', 'theses.status', '=', 'theses_status.id')
                            ->select('theses.id','theses.nameVN','theses.student1','theses.student2','theses.instructor1','theses.instructor2', 'theses.description', 'theses.updated_at', 'theses_status.name', 'theses_status.id as theses_status_id')
                            ->where('nameVN', 'like', '%' . $req->search . '%')
                            ->orwhere('instructor1', 'like', '%' . $req->search . '%')
                            ->orwhere('instructor2', 'like', '%' . $req->search . '%')
                            ->paginate($numberPaging);
        $searchQuery->appends($req->all());
        return view('thesis.list', ['resultSearchQuery' => $searchQuery]);
    }

    public function show(Request $request)
    {
        $thesis = thesis::join('theses_status', 'theses.status', '=', 'theses_status.id')
                        ->select('theses.id','theses.nameVN','theses.student1','theses.student2','theses.instructor1','theses.instructor2', 'theses.description', 'theses.updated_at', 'theses_status.name', 'theses_status.id as theses_status_id')
                        ->where('theses.id', '=', $request->id)->get();
        return view('thesis.show', ['theses' => $thesis]);
    }

    public function store(FormStoreRequest $request)
    {
        // send email
        Success::dispatch(Auth::user());
        // store to application
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $form = new IssuesThesis;
        $form->thesis_id = $request->thesis_id;
        $form->user_id = $request->user_id;
        $form->expectedIssuesDate = $request->expected_date;
        $form->save();
        return back()->with('success', 'Bạn đã đăng kí thành công!');
    }
}
