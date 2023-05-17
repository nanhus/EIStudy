<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class OTP extends Model
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;

    protected $table = 'otp_mails';
    protected $primaryKey = 'user_id';


    protected $fillable = [
        'email',
        'otp_code',
        'otp_created_at',
        'otp_expired_at',
    ];


    protected $casts = [
        'otp_created_at' => 'datetime',
        'otp_expired_at'=> 'datetime',
    ];
}
