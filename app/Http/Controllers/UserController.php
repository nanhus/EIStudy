<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;




class UserController extends Controller
{


    public function register()
    {
        return view('layouts/register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | unique:tb_user',
            'password' => 'required',
            'password_confirmation' => 'required | same:password'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_token' => Str::uuid(),
            'email_verified_at' => null,
        ]);

        $user->save();

        $url = url('/verify-email/' . $user->verification_token);
        $mail = Mail::to($user->email)->send(new VerifyEmail($url));

        if (!$mail) {
            Log::error('Failed to send verification email to ' . $user->email);
            return redirect()->back()->withErrors('Không thể gửi email xác minh.');
        }

        return redirect()->route('login')->with('success', 'Đăng ký thành công. Hãy xác minh Email để đăng nhập!');
    }

    public function login()
    {
        return view('layouts/login');
    }

    public function login_action(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $user = User::where('email', $credentials['email'])->first();
    
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Thông tin tài khoản hoặc mật khẩu không chính xác!'],
            ]);
        }
    
        // Kiểm tra trạng thái xác thực email
        if (!$user->email_verified_at) {
            throw ValidationException::withMessages([
                'email' => ['Vui lòng xác minh địa chỉ email của bạn trước khi đăng nhập.'],
            ]);
        }
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            return redirect()->intended('home');
        }
    
        return redirect()->back()->withErrors(['password' => 'Thông tin tài khoản hoặc mật khẩu không chính xác!']);
    }
    

    public function email_verified_at(Request $request, $token)
    {
        $user = User::where('verification_token', $token)->firstOrFail();
        $user->email_verified_at = now();
        $user->save();
        return redirect()->route('login')->with('success', 'Địa chỉ email của bạn đã được xác minh.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
