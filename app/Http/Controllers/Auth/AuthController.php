<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\GenerateOtpRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return to_route('login');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->getData();

        $user = User::create($data);

        return redirect()->route('login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::wherePhoneNo($request->phone_no)->whereOtp($request->otp)->first();

        if ($user) {
            Auth::login($user);
            if (Auth::user()->role == 'admin') {
                return to_route('admin.index');
            }else{
                return to_route('user.index');
            }
        }

        return back()->withErrors(['otp' => 'Invalid OTP']);
    }

    // genrate otp
    public function generateOtp(GenerateOtpRequest $request)
    {
        $phone_no = $request->phone_no;
        $otp = rand(1000, 9999);

        User::wherePhoneNo($phone_no)->update([
            'otp' => $otp
        ]);

        return response()->json([
            'otp' => $otp
        ]);
    }

}
