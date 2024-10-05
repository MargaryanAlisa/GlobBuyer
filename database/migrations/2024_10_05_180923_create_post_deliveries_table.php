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
        Schema::create('post_deliveries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('post_id')->constrained()->cascadeOnDelete();
            $table->tinyInteger('delivery_period');
            $table->timestamp('delivery_date')->nullable();
            $table->string('country_from');
            $table->string('country_to');
            $table->longText('delivery_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_deliveries');
    }
};
