<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 250)->nullable();
            $table->string('title', 355)->nullable();
            $table->string('keyword', 160)->nullable();;
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('source_link', 355)->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('website_id')->nullable();
            $table ->integer('author_id')->default(1);
            $table ->integer('hot')->default(0);
            $table ->tinyInteger('status')->default(1)->index();
            $table ->tinyInteger('delete_flag')->default(0)->index();
            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('website_id')
                ->references('id')
                ->on('website')
                ->onUpdate('cascade')
                ->onDelete('set null');
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
        Schema::dropIfExists('article');
    }
}
