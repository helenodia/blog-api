<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title", 100);
            $table->text("article");
            $table->timestamps();
        });
    }
     
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}


