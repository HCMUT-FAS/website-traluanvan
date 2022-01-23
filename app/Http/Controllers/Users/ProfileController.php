<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::select('*')->where('id', '=', $user->id)->get();
        return view('student.profile', ['usersData' => $users]);
    }

    public function update(Request $request)
    {
        $user = User::where('id', $request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email
        ]);
        return back()->with('success', 'Cập Nhật Thành Công');
    }
}
