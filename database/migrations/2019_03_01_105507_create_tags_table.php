<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create the tags table
        // it's a termlist so call the string column name
        // don't need timestamps - not very useful here
        Schema::create("tags", function (Blueprint $table) {
        $table->increments("id");
        $table->string("name", 30);
        });
        // create the pivot table using the Eloquent naming convention
        Schema::create("article_tag", function (Blueprint $table) {
        // still have an id column
        $table->increments("id");
        // create the article id column and foreign key
        $table->integer("article_id")->unsigned();
        $table->foreign("article_id")->references("id")
        ->on("articles")->onDelete("cascade");
        // create the tag id column and foreign key
        $table->integer("tag_id")->unsigned();
        $table->foreign("tag_id")->references("id")
        ->on("tags")->onDelete("cascade");
        });
    }

    // update the down method
    public function down()
    {
        // remove the pivot table first
        // otherwise all the tags foreign key contraints would fail
        Schema::dropIfExists("article_tag");
        // then drop the tags table
        Schema::dropIfExists("tags");
    }
}
