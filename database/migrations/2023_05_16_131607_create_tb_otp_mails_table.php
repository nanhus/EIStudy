<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('otp_mails', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('otp_code');
            $table->dateTime('otp_created_at');
            $table->dateTime('otp_expired_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('otp_mails');
    }
};
