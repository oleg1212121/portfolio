<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('название специальности');
            $table->string('institute')->comment('учебное заведение');
            $table->date('start')->comment('начало обучения');
            $table->date('end')->comment('конец обучения');
            $table->text('desc')->comment('описание');

            $table->timestamps();

            $table->unsignedBigInteger('user_id')->comment('внешний ключ');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educations');
    }
}
