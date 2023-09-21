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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // This adds an auto-increment primary key.
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            // $table->timestamps(); // to avoid error: Unknown column 'updated_at' in 'field list' because it is the default behavior expected by Laravel.


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
