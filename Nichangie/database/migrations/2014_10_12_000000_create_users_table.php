<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('phonenumber');
            $table->string('email')->nullable();
            $table->string('location')->nullable();
            $table->string('district')->nullable();
            $table->string('profilelink')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('joindate')->nullable();
            $table->integer('status');
            $table->string('idtype');
            $table->string('idlink');
            $table->integer('user_type')->default(User::DONEE_USER_TYPE)->nullable();
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
        Schema::dropIfExists('users');
    }
}
