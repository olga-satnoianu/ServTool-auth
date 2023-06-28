<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\Client;

class PassportController extends Controller
{
    public function viewRegister() {
        return view('auth.register');
    }

    public function register () {
        var_dump('aaa');
    }

    public function viewLogin() {
        return view('auth.login');
    }

//    public function viewAuthorize() {
//        return view('auth.authorize');
//    }

    public function login(LoginRequest $request) {
        $credentials = request(['email', 'password']);
//        throw new \LogicException(var_export($credentials, true));

        if(!Auth::attempt($credentials))
        {
            throw ValidationException::withMessages([
                'login_error' => "Incorect email or password",
            ]);
        }
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
