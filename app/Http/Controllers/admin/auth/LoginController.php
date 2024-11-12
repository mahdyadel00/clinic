<?php

namespace App\Http\Controllers\admin\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function loginPage() {
        return view ('admin.auth.login');
    }

    public function login(Request $request) {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        $this->logout();

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        try{
            DB::beginTransaction();

            Auth::logout();
            DB::commit();
            return redirect()->route('admin.loginPage');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('error')->error('Error logout: '.$e->getMessage());
            return back();
        }
    }
}
