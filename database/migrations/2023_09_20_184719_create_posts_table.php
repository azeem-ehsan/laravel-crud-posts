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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('image_url');
            $table->string('post_content');
            $table->timestamps();
            
            // Define foreign key relationship
            $table->unsignedBigInteger('user_id'); // craeting a user_id column
            $table->foreign('user_id')->references('id')->on('users');  // making user_id a Foreign key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
