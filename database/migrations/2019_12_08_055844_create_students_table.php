<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('password')->nullable();
            $table->integer('course_id')->nullable();
            $table->integer('batch_id')->nullable();
            $table->string('student_image')->nullable();
            $table->string('present_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('secret_code')->nullable();
            $table->string('student_id')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_admitted')->default(false);
            $table->boolean('payment_status')->default(false);
            $table->string('paid')->nullable();
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
        Schema::dropIfExists('students');
    }
}
