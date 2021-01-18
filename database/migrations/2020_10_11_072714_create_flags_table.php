<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instance_id');
            $table->string('description')->nullable();
            $table->string('hint')->nullable();
            $table->string('points')->nullable();
            $table->string('flag')->nullable();
            $table->timestamps();

            $table->foreign('instance_id')->references('id')->on('instances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flags');
    }
}
