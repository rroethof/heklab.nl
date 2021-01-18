<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSollutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sollutions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('slug', 120)->unique()->index();
            $table->string('image', 254);
            $table->text('excerpt');
            $table->longtext('body');
            $table->timestamps();
            $table->unsignedInteger('author_id')->index()->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('instance_id')->index()->references('id')->on('instances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sollutions');
    }
}
