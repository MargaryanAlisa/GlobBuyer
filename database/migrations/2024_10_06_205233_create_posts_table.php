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
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('product_id')->constrained();
            $table->tinyInteger('product_measured');
            $table->integer('product_quantity')->nullable();
            $table->string('additional_fee');
            $table->string('status')->default(\App\Models\Post::STATUS['pending']);
            $table->string('visibility')->default(\App\Models\Post::VISIBILITY['visible']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
