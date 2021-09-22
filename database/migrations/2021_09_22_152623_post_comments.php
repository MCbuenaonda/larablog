<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('message');
            $table->enum('approved', ['1', '0'])->nullable()->default('0');
            $table->bigInteger('user_id');
            $table->bigInteger('post_id');
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
        //
    }
}
