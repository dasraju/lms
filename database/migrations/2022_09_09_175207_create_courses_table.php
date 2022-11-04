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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id');
            $table->string('name');
            $table->foreignId('course_category_id');
            $table->text('description');
            $table->string('cover_img_url');
            $table->set('type',['free','paid']);
            $table->double('price',8,2);
            $table->foreignId('instructor_id');
            $table->string('total_time');
            $table->enum('featured',[0,1]);
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
        Schema::dropIfExists('courses');
    }
};
