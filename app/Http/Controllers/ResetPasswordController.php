<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OTPMail;
use App\Models\User;
use App\Models\OTP;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('emails.forgot-password');
    }

    public function getOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email =  $request->email;
        $otp_code = mt_rand(100000, 999999);

        // Save OTP code to database
        $otp_mail = new OTP();
        $otp_mail->email = $email;
        $otp_mail->otp_code = $otp_code;
        $otp_mail->otp_created_at = now();
        $otp_mail->otp_expired_at = now()->addMinutes(3);
        $otp_mail->save();

        // Send OTP code to email
        $user = User::where('email', $email)->first();

        if ($user) {
            Mail::to($email)->send(new OTPMail($otp_code));
        } else {
            return redirect()->back()->withErrors('Invalid email!');
        }

        return redirect()->route('get-verify-otp')
                        ->with(['send-otp'  => 'Một mã xác minh đã được gửi đến email của bạn.',
                                'expiry'    => 'Hiệu lực 3 phút',
                                ]);
    }

    public function getVerifyOTP()
    {   
        return view('emails.verify-otp');
    }

    public function verifyOTP(Request $request)
    {
        $otp = $request->input('otp');

        $otpMail = OTP::where('otp_code', '=', $otp)
            ->where('otp_expired_at', '>', now())
            ->first();

        if (!$otpMail) {
            return back()->withErrors('Mã OTP không hợp lệ hoặc đã hết hạn!!');
        }

        // $otpMail->delete();

        return redirect()->route('get-reset-password', [
            'email' => $otpMail->email,
            'otp' => $otp,
        ])->with('reset-password', 'Mã OTP hợp lệ. Vui lòng thay đổi mật khẩu của bạn.');
    }

    public function getResetPassword() {
        return view("emails.reset-password");
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
        ]);

        $email = $request->email;
        $password = $request->password;

        // Tìm người dùng trong bảng users bằng email
        $user = User::where('email', $email)->first();

        if ($user) {
            // Lưu mật khẩu đã thay đổi
            $user->password = Hash::make($password);
            $user->save();

            return redirect()->route('login')->with('success', 'Đặt lại mật khẩu thành công. Bây giờ bạn có thể đăng nhập bằng mật khẩu mới của mình.');
        } else {
            return back()->withErrors('Không tìm thấy email. Vui lòng thử lại.');
        }
    }
}
