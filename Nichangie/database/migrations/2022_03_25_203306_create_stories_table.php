<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('link');
            $table->text('location')->nullable();
            $table->text('description')->nullable();
            $table->text('raised')->nullable();
            $table->text('owner_phonenumber')->nullable();
            $table->text('owner_name')->nullable();
            $table->bigInteger('owner_id', false, true);
            $table->double('fundgoals');
            $table->date('deadline');
            $table->tinyInteger('type')->nullable();
            $table->text('category')->nullable();
            $table->integer('category_id', false, true)->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('campaigns');
    }
}
