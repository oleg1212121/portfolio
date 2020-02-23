<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeuralInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neural_inputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('Название входного свойства');
            $table->float('weight')->comment('Вес свойства');
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
        Schema::dropIfExists('neural_inputs');
    }
}
