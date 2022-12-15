<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillageHasFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_has_files', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('extension');
            $table->foreignId('village_id')->references('id')->on('villages');
            $table->foreignId('file_id')->references('id')->on('files');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->boolean('is_verified')->default('0');
            $table->integer('size');
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
        Schema::dropIfExists('village_has_files');
    }
}
