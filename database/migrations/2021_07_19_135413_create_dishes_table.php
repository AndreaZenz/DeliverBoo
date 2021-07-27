<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->decimal('price', $precision = 8, $scale = 2);
            $table->longtext('description')->nullable();
            $table->boolean('visible')->default(true);
            $table->text('ingredient_list');
            $table->string('img_url')->nullable();
            
            $table->unsignedBigInteger("restaurant_id")->nullable();
            $table->foreign("restaurant_id")
                ->references("id")
                ->on("restaurants")
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}
