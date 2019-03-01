<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("comments", function (Blueprint $table) {
            // create the basic comments columns
            $table->increments("id");
            $table->string("email", 100); // use a VARCHAR
            $table->text("comment"); // could be any length
            $table->timestamps();
            // create the article_id column
            $table->integer("article_id")->unsigned();
            // set up the foreign key constraint
            // this tells MySQL that the article_id column
            // references the id column on the articles table
            // we also want MySQL to automatically remove any
            // comments linked to articles that are deleted
            $table->foreign("article_id")->references("id")
            ->on("articles")->onDelete("cascade"); // this tells it 'article_id' references 'id' on a different table in the database called 'articles'  - so now couldn't add an invalid article id as a value in this column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
