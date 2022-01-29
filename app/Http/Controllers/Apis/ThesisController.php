<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormStoreRequest;
use App\Jobs\StudentIssuesSuccess;
use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\IssuesThesis;

class ThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Thesis::select('*')->get();
        $response = ['data' => $data];
        return response($response, 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormStoreRequest $request)
    {
         // send email
         StudentIssuesSuccess::dispatch(Auth::user());
         // store to application
         date_default_timezone_set('Asia/Ho_Chi_Minh');
         $form = new IssuesThesis;
         $form->thesis_id = $request->thesis_id;
         $form->user_id = $request->user_id;
         $form->expectedIssuesDate = $request->expected_date;
         $form->save();
        //  return back()->with('success', 'Bạn đã đăng kí thành công!');
         return response(['message' => 'Đăng kí thành công', 201]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
