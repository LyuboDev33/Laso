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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('facebook_lead_id')->unique();
            $table->string('facebook_form_id');
            $table->string('facebook_ad_id')->nullable();

            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->json('questions')->nullable();

            $table->timestamp('facebook_created_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
