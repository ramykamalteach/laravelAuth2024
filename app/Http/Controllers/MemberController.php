<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\Member;

class MemberController extends Controller
{
    
    public function verifyLogin(Request $request) {
        $request->validate([
            'logName' => 'required',
            'password' => 'required',
        ]);

        $loginUser = Member::where("logName", "=", $request->logName)->first();

        if($loginUser){
            if (Hash::check($request->password, $loginUser->password)) {

                Session::put('userId', $loginUser->id);
                Session::put('userRole', $loginUser->role);
                Session::put('fullName', $loginUser->fullName);

                if($loginUser->role == 'admin') {
                    return redirect()->route('admin.index');
                }
                else if($loginUser->role == 'editor') {
                    return redirect()->route('editor.index');
                }
                else if($loginUser->role == 'supervisor') {
                    return redirect()->route('supervisor.index');
                }
                
            }
            else {
                return redirect()->back()->with("failed", "Login Failed");
            }
        }
        else {
            return redirect()->back()->with("failed", "Login Failed");
        }

    }

    public function logout() {
        Session::flush();

        return redirect()->route('login')->with("logout", "You logged out, Good bye !!!");
    }
}
