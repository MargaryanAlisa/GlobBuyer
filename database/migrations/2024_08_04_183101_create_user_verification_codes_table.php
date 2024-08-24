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
        Schema::create('user_verification_codes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email_verification_code')->nullable();
            $table->string('phone_verification_code')->nullable();
            $table->boolean('phone_verified')->default(false);
            $table->boolean('email_verified')->default(false);
            $table->enum('status', array_values(\App\Models\UserVerificationCode::VERIFICATION_CODE_STATUSES))->comment("pending => 1, verified => 2");
            $table->enum('verification_type', array_values(\App\Models\UserVerificationCode::VERIFICATION_TYPES))->comment("registration => 1, forgot_password => 2");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_verification_codes');
    }
};
