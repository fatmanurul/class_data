<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->bigIncrements('cls_id');
            $table->string('cls_name');
            $table->foreign('cls_student_id')->references('std_id')->on('students')->onDelete('cascade')->unique();
            $table->foreign('cls_teacher_id')->references('tcr_id')->on('teachers')->onDelete('cascade')->unique();
            $table->boolean('cls_status')->default(1);
            $table->unsignedBigInteger('cls_created_by');
            $table->unsignedBigInteger('cls_updated_by')->nullable();
            $table->unsignedBigInteger('cls_deleted_by')->nullable();
            $table->timestamp('cls_created_at');
            $table->timestamp('cls_updated_at')->nullable();
            $table->timestamp('cls_deleted_at')->nullable();
        });
        Schema::table('classes', function (Blueprint $table) {
            $table->foreign('usr_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('usr_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('usr_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
