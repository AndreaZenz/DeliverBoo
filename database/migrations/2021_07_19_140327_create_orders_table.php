<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('client_name', 128);
            $table->char('client_surname', 128)->nullable();
            $table->integer('client_phone')->nullable();
            $table->char('client_address', 255);
            $table->longText('client_comment')->nullable();
            $table->char('client_email', 128)->nullable();
            $table->decimal('total_price', $precision = 8, $scale = 2);
            $table->text('ArrayDishes')->nullable();
            $table->boolean('is_payed')->nullable();

            $table->unsignedBigInteger("restaurant_id")->nullable();
            $table->foreign("restaurant_id")
                ->references("id")
                ->on("restaurants");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
