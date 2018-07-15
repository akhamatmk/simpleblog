<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->length(5)->unsigned();
            $table->integer('created_by')->length(5)->unsigned();
            $table->text('text');
            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_comments', function (Blueprint $table) {
            $table->dropIfExists('post_comments');
            $table->dropForeign('post_id_post_comments_foreign');
            $table->dropForeign('created_by_post_comments_foreign');
        });
    }
}
