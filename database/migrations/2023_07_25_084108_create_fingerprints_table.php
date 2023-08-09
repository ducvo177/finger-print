<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFingerprintsTable extends Migration
{
    public function up()
    {
        Schema::create('fingerprints', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date');
            $table->text('content');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fingerprints');
    }
}
