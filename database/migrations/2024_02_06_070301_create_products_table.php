<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('brand_id')->unsigned()->nullable();
            $table->longText('description');
            $table->integer('price');
            $table->integer('quantity')->default(1)->nullable();
            $table->integer('stock_quantity_available')->default(1);
            $table->decimal('discount',8,2)->nullable()->default(0);
            $table->enum('status',['in stock','out of stock'])->default('in stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
