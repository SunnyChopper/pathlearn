<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title', 128);
            $table->text('description')->nullable();
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('roadmap_sections');
            $table->string('link', 512);
            $table->integer('clicks')->default(0);
            $table->string('category', 128);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('section_contents');
    }
}
