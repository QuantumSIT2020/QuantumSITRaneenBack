<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoicalmediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soicalmedia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('massenger');
            $table->string('whatsup');
            $table->text('address');
            $table->text('gmail');
            $table->string('phone_number');
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
        Schema::dropIfExists('soicalmedia');
    }
}
