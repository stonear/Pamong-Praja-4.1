<?php

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->enum('sex', ['L', 'P']);
            $table->string('nationality');
            $table->string('id_type');
            $table->string('id_number');
            $table->date('date_of_birth');
            $table->integer('phone');
            $table->string('community_name');
            $table->string('community_type');

            $table->boolean('forum');
            $table->boolean('reunion');
            $table->boolean('run');

            $table->enum('status', ['registered', 'unconfirmed', 'confirmed']);

            $table->rememberToken();
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
