<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('platform')->nullable(true)->comment('Информация о платформе пользователя');
            $table->string('browser')->nullable(true)->comment('Информация о браузере user-agent');
            $table->string('version')->nullable(true)->comment('Информация о версии браузера user-agent');
            $table->string('referer')->nullable(true)->comment('Адрес с которого совершен переход');
            $table->string('ip')->nullable(true)->comment('ip запроса');
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
        Schema::dropIfExists('clients');
    }
}
