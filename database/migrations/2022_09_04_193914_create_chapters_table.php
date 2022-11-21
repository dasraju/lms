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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_sub_category_id')->cascadeOnDelete();
            $table->string('name');
            $table->string('unique_name');
            $table->set('type',['free','paid']);
            $table->set('chap_category',['revision','topical']);
            $table->set('topic_type',['mcq','theory'])->nullable( );
            $table->set('status',['0','1']);
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
        Schema::dropIfExists('chapters');
    }
};
