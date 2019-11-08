<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('title');
            $table->string('time');
            $table->string('pref_id');
            $table->string('shop');
            $table->string('format');
            $table->text('body');
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
        Schema::dropIfExists('recruits');
    }
}
