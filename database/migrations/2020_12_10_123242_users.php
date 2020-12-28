<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code_id');
            $table->string('session_id');
            $table->string('amazon_id')->nullable();
            $table->string('nickname')->nullable();
            $table->string('full_name')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('ip');
            $table->string('browser')->nullable();
            $table->string('os')->nullable();
            $table->json('custom_data')->nullable();
            $table->json('custom_user_data')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->timestamp('completed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
