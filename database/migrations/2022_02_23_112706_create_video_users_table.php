<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_users', function (Blueprint $table) {
            // $table->id();
            $table->bigInteger('video_id');
            $table->bigInteger('user_id');
            $table->primary(['video_id', 'user_id'],  'primaryKeyName');
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
        Schema::dropIfExists('video_users');
    }
}
