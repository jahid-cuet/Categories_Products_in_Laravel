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
              $table->string('image')->nullable();
              $table->string('name')->nullable();
              $table->integer('price')->nullable();
              $table->integer('category_id')->nullable();
              $table->text('small_description')->nullable();
            //   $table->text('description')->nullable();
              $table->integer('order')->default(0);
            //   $table->boolean('is_active')->default(true);
              $table->unsignedBigInteger('created_by')->nullable();
              $table->unsignedBigInteger('updated_by')->nullable();
              $table->timestamps();
            //   $table->softDeletes();
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
