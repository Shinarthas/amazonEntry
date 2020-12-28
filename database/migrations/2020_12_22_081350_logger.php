<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Logger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('code_id')->unsigned();
            $table->integer('old_status');
            $table->integer('new_status');
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
        Schema::drop("code_logs");
    }
}
