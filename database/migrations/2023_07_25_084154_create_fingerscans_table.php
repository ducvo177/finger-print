<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFingerScansTable extends Migration
{
    public function up()
    {
        Schema::create('fingerscans', function (Blueprint $table) {
            $table->id();
            $table->boolean('isCorrect');
            $table->date('date');
            $table->text('tmpContent');
            $table->unsignedBigInteger('fingerprint_id');
            $table->unsignedBigInteger('scanmachine_id');
            $table->timestamps();

            $table->foreign('fingerprint_id')->references('id')->on('fingerprints')->onDelete('cascade');
            // Add foreign key for scanmachine_id if it's related to another table
        });
    }

    public function down()
    {
        Schema::dropIfExists('fingerscans');
    }
}