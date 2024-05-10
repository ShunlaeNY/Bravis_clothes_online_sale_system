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
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate()->constrained();
            $table->foreignId('admin_id')->references('id')->on('admins')->cascadeOnDelete()->cascadeOnUpdate()->constrained();
            $table->foreignId('supplier_id')->references('id')->on('suppliers')->cascadeOnDelete()->cascadeOnUpdate()->constrained();
            $table->float('price');
            $table->integer('small_qty');
            $table->integer('medium_qty');
            $table->integer('large_qty');
            $table->string('gender');
            $table->string('description');
            $table->string('image');
            $table->string('color_image');
            $table->string('uuid');
            $table->string('status');
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
