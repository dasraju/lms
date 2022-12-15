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
        Schema::create('resource_pdfs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_sub_category_id')->cascadeOnDelete();
            $table->string('title');
            $table->set('file_type',['book','syllabus']);
            $table->set('price_type',['free','paid']);
            $table->enum('view',[0,1]);
            $table->enum('download',[0,1]);
            $table->enum('published',[0,1]);
            $table->string('file_name');
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
        Schema::dropIfExists('resource_pdfs');
    }
};
