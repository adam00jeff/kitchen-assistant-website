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
        /*        'name','supplier', 'serving_unit', 'serving_qty','info','callories','nutrients', 'allergens'*/
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('supplier');
            $table->string('serving_unit');
            $table->integer('serving_qty');
            $table->string('info');
            $table->integer('callories');
            $table->string('nutrients');
            $table->string('allergens');
            $table->string('image');
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
        Schema::dropIfExists('stock');
    }
};
