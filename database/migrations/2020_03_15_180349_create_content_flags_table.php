<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentFlagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_flags', function (Blueprint $table) {
            $table->id();
            $table->integer('mode');
            $table->bigInteger('roadmap_id')->unsigned()->nullable();
            $table->foreign('roadmap_id')->references('id')->on('roadmaps');
            $table->bigInteger('content_id')->unsigned()->nullable();
            $table->foreign('content_id')->references('id')->on('section_contents');
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
        Schema::dropIfExists('content_flags');
    }
}
