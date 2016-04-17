<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    	Schema::create('tb_blog_post', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('main_image')->nullable();
		    $table->string('main_image_alt')->nullable();
		    $table->string('you_tube_video_id')->nullable();
            $table->text('summary');
            $table->text('content');
            $table->bigInteger('count_views');
		    $table->boolean('is_sticky');
		    $table->text('meta_description');
		    $table->text('meta_keywords');
            $table->enum('status', array('DRAFT', 'APPROVED'))->default('DRAFT');
		    $table->dateTime('published_at')->nullable();
		    $table->dateTime('deleted_at')->nullable();
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
        Schema::drop('tb_blog_post');
	}

}
