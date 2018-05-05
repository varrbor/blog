<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeginKeysForTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function ($table) {
            $table->integer('users_id')->unsigned()->change();
            $table->integer('posts_id')->unsigned()->change();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
        });
        Schema::table('users_has_posts', function ($table) {
            $table->integer('users_id')->unsigned()->change();
            $table->integer('posts_id')->unsigned()->change();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
        });
        Schema::table('posts_has_categories', function ($table) {
            $table->integer('posts_id')->unsigned()->change();
            $table->integer('categories_id')->unsigned()->change();
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
        });
        Schema::table('tags_has_posts', function ($table) {
            $table->integer('tags_id')->unsigned()->change();
            $table->integer('posts_id')->unsigned()->change();
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function ($table) {
            $table->dropForeign('comments_users_id_foreign');
            $table->dropForeign('comments_posts_id_foreign');
        });
        Schema::table('users_has_posts', function ($table) {
            $table->dropForeign('comments_users_id_foreign');
            $table->dropForeign('comments_posts_id_foreign');
        });
        Schema::table('posts_has_categories', function ($table) {
            $table->dropForeign('comments_posts_id_foreign');
            $table->dropForeign('comments_categories_id_foreign');
        });
        Schema::table('tags_has_posts', function ($table) {
            $table->dropForeign('comments_tags_id_foreign');
            $table->dropForeign('comments_posts_id_foreign');
        });
    }
}
