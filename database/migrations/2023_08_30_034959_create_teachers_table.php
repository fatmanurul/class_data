<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('tcr_id');
            $table->integer('tcr_NUPTK');
            $table->string('tcr_name');
            $table->integer('tcr_religion');
            $table->integer('tcr_gender');
            $table->string('tcr_place_of_birth');
            $table->date('tcr_date_of_birth');
            $table->string('tcr_subjects');
            $table->integer('tcr_number_phone');
            $table->text('tcr_address');
            $table->boolean('tcr_status')->default(1);
            $table->unsignedBigInteger('tcr_created_by');
            $table->unsignedBigInteger('tcr_updated_by')->nullable();
            $table->unsignedBigInteger('tcr_deleted_by')->nullable();
            $table->timestamp('tcr_created_at');
            $table->timestamp('tcr_updated_at')->nullable();
            $table->timestamp('tcr_deleted_at')->nullable();
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->foreign('tcr_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tcr_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tcr_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
