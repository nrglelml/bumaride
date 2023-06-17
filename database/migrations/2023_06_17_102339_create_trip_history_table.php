<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('trip_history', function (Blueprint $table) {
            $table->id();
            $table->string('departure');
            $table->string('destination');
            $table->date('date');
            $table->text('description')->nullable()->default(''); ;
            $table->integer('people_num')->unsigned()->default(1);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trip_history');
    }
}

