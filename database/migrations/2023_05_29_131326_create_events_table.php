<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('message_id');
            $table->string('event_date');
            $table->unsignedBigInteger('receiver_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('message_id')
            ->references('id')->on('messages')->onDelete('cascade');
            $table->foreign('receiver_id')
            ->references('id')->on('receivers')->onDelete('cascade');
            $table->foreign('user_id')
            ->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('events');
    }
}
