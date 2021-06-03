<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('name'); 
            $table->string('email'); 
            $table->string('phone')->nullable();
            $table->longtext('address')->nullable();
            $table->string('education')->nullable();
            $table->string('designation')->nullable();

            $table->date('joining_date')->nullable();

            $table->date('leaving_date')->nullable();
            $table->longtext('leaving_reason')->nullable();

            $table->longtext('data')->nullable();
            $table->boolean('is_admin')->default(0);
            $table->unsignedBigInteger('progress_type')->default(0);
            $table->string('progress')->nullable();


            $table->foreignId('user_id');
            $table->boolean('is_active')->default(0);
            $table->string('parcel')->nullable();
            $table->boolean('has_deleted')->default(0);
            $table->boolean('has_blocked')->default(0);
            
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
        Schema::dropIfExists('employees');
    }
}
