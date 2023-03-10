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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('date_purchase');
            $table->string('store');
            $table->string('document_number')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('guide_number')->unique();
            $table->string('conveyor');
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->integer('debt_value');
            $table->string('product')->nullable();
            $table->integer('shipping_value')->nullable();
            $table->string('reason')->nullable();
            $table->boolean('is_trustworthy')->default(1);
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
        Schema::dropIfExists('reports');
    }
};
