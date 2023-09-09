<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('std_id');
            $table->unsignedBigInteger('std_nisn');
            $table->string('std_name');
            $table->integer('std_religion');
            $table->string('std_gender');
            $table->string('std_place_of_birth');
            $table->date('std_date_of_birth');
            $table->BigInteger('std_student_phone_number');
            $table->string('std_parents_name');
            $table->BigInteger('std_parents_phone');
            $table->text('std_address');
            $table->boolean('std_status')->default(1);
            $table->unsignedBigInteger('std_created_by');
            $table->unsignedBigInteger('std_updated_by')->nullable();
            $table->unsignedBigInteger('std_deleted_by')->nullable();
            $table->timestamp('std_created_at');
            $table->timestamp('std_updated_at')->nullable();
            $table->timestamp('std_deleted_at')->nullable();
        });

        Schema::table('students', function (Blueprint $table) {
            $table->foreign('std_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('std_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('std_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
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
