<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePriceFieldInProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            DB::update("update products set price = price * 100");

            \Schema::table("products", function ($table) {
                $table->unsignedInteger('price')->change();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::transaction(function () {
            DB::update("update products set price = price / 100");

            \Schema::table("products", function ($table) {
                $table->decimal('price', 9, 2)->change();
            });
        });
    }
}
