<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kormandons', function (Blueprint $table) {
            $table->id();
            $table->integer('dastgoh');
            $table->string('name');
            $table->string('lastname');
            $table->string('nasab')->nullable();
            $table->string('vazifa');
            $table->integer('shoxis')->nullable();
            $table->string('utoq')->nullable();
            $table->string('doxili')->nullable();
            $table->string('xizmati');
            $table->string('mobili');
            $table->boolean('sobiq')->nullable();
            $table->string('teleg')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('department_id')->nullable()
                ->constrained('departments')
                ->onUpdate('cascade');
            $table->foreignId('embassies_id')->nullable()
                ->constrained('embassies')
                ->onUpdate('cascade');
            $table->foreignId('dipservices_id')->nullable()
                ->constrained('dipservices')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('kormandons');
    }
};
