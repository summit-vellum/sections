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
            $table->integer('id');
            $table->integer('parent_id')->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('title', 255)->nullable()->comment('section\'s meta title');
            $table->mediumText('description')->nullable()->comment('section\'s meta description');
            $table->text('keywords')->nullable()->comment('section\'s meta keywords');
            $table->tinyInteger('order')->nullable()->comment('order of render in menu (front end)');
            $table->tinyInteger('status')->nullable()->comment('1=active 0=inactive');
            $table->timestamps();
            $table->softDeletes();
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
