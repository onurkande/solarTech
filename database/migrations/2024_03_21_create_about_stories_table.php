<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('about_stories', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('title');
            $table->text('desc');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_stories');
    }
}; 