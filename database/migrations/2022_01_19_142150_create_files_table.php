<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_multiple')->default('0');
            $table->boolean('is_questionaire')->default('0');
            $table->string('description')->nullable();
            $table->string('requirement')->nullable();
            $table->integer('max_size')->nullable();
            $table->string('allowed_ext')->nullable();
            $table->string('accept')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
