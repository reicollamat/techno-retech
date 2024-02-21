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
            $table->foreignId('seller_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('sku')->nullable();
            $table->string('slug')->nullable();
            $table->string('category');
            $table->float('weight')->default(0.00)->nullable();
            $table->decimal('price', 20, 2);
            // $table->string('image')->default(json_encode(['img/no-image-placeholder.png']))->nullable();
            $table->string('status')->default('available');
            $table->string('condition');
            $table->integer('stock')->nullable();
            $table->integer('reserve')->nullable();
            $table->float('rating')->default(0.0);
            $table->integer('purchase_count')->default(0);
            $table->integer('view_count')->default(0);
            $table->softDeletes();
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
