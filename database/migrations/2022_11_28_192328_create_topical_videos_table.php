<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topical_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topical_chapter_id');
            $table->string('title');
            $table->string('url');
            $table->set('price_type',['free','paid']);
            $table->enum('view',[0,1]);
            $table->enum('download',[0,1]);
            $table->enum('published',[0,1]);
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
        Schema::dropIfExists('topical_videos');
    }
};
