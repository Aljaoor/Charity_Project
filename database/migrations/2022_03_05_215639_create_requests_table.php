<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status');
            $table->integer('member_id')->unsigned();
            $table->integer('office_id')->unsigned();
            $table->string('cancellation_reason')->nullable();
            $table->string('proof_image');
            $table->foreign('office_id')->on('offices')->references('id')->onDelete('cascade');
            $table->foreign('member_id')->on('users')->references('id')->onDelete('cascade');


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
        Schema::dropIfExists('requests');
    }
}
