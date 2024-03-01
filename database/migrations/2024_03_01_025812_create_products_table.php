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
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug');
            $table->string('sku')->unique();
            $table->decimal('price', 15, 2)->nullable();
            $table->decimal('price_sale', 15, 2)->nullable();
            $table->uuid('category_id')->index();
            $table->string('status');
            $table->string('stock_status')->default('IN_STOCK');
            $table->boolean('manage_stock')->default(false);
            $table->dateTime('publish_date')->nullable()->index();
            $table->text('excerpt')->nullable();
            $table->text('body')->nullable();
            $table->json('metas')->nullable();
            $table->string('featured_image')->nullable();
            $table->uuid('author_id')->index();
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
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
