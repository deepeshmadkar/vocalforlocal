<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsermanagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usermanagers', function (Blueprint $table) {
            $table->id();
            $table->json('registered_ip')->nullable();
            $table->json('device_details')->nullable();
            $table->timestamp('accepted_toc')->nullable();
            $table->string('admin_email_otp')->nullable();
            $table->string('email_otp')->nullable();
            $table->boolean('admin_email_verified')->default(0);
            $table->timestamp('email_verified')->nullable();
            $table->string('admin_sms_otp')->nullable();
            $table->string('sms_otp')->nullable();
            $table->boolean('admin_sms_verified')->default(0);
            $table->timestamp('sms_verified')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usermanagers');
    }
}
