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
        Schema::create('restorans', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('city', 124);
            $table->string('adress', 124);
            $table->string('workhours', 64);
            $table->decimal('rating', 4, 2)->nullable(); //gali buti tuscias pradžioje
            $table->unsignedBigInteger('rating_sum')->default(0); //kudami nustatonm defaulta 0
            $table->unsignedBigInteger('rating_count')->default(0);
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
        Schema::dropIfExists('restorans');
    }
};
