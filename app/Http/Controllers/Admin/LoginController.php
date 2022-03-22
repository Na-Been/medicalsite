<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8',
        ]);
        try {
            $email = $request->input('email');
            $password = $request->input('password');
            $userdata = array(
                'email' => $email,
                'password' => $password
            );
            if (Auth::attempt($userdata)) {
                if (Auth::user()->status == 1) {
                    return redirect('admin/dashboard');
                } else {
                    Auth::logout();
                    return redirect()->route('login');
                }
            } else {
                return back()->with('loginFailed', 'Either Email Or Password Does Not Match');
            }
        } catch (\Exception $exception) {
            return back('failed', 'Something Went Wrong Please Try Again');
        }
    }
}
