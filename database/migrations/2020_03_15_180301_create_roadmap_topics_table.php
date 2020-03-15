<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadmapTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roadmap_topics', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('roadmap_id')->unsigned();
            $table->foreign('roadmap_id')->references('id')->on('roadmaps');
            $table->bigInteger('topic_id')->unsigned();
            $table->foreign('topic_id')->references('id')->on('topics');
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
        Schema::dropIfExists('roadmap_topics');
    }
}
