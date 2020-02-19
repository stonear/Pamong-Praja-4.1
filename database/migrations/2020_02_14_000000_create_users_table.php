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
            $table->string('phone');
            $table->string('community_name')->nullable();
            $table->string('community_type');
            $table->string('t_shirt')->nullable();

            $table->string('payment_proof')->nullable();
            $table->unsignedBigInteger('event_id')->nullable();

            $table->enum('status', ['registered', 'unconfirmed', 'confirmed', 'rejected']);

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
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
