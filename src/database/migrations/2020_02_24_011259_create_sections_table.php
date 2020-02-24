<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('parent_id')->nullable();
            $table->string('slug', 255);
            $table->string('url', 255);
            $table->string('name', 255);
            $table->string('title', 255);
            $table->string('description', 255)->nullable();
            $table->string('keywords', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->tinyInteger('order')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('sections');
    }
}
