<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestForHelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_for_helps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(3);
            $table->integer('family_count');
            $table->timestamp('request_verified_at')->nullable();
            $table->integer('member_id')->unsigned();
            $table->integer('office_id')->unsigned();
            $table->text('cancellation_reason')->nullable();
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
        Schema::dropIfExists('request_for_helps');
    }
}
