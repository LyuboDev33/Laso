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

            $table->foreignId('lead_form_id')
                ->constrained('lead_forms')
                ->cascadeOnDelete();

            $table->string('facebook_lead_id')->unique();
            $table->string('facebook_ad_id')->nullable();

            $table->boolean('is_seen')->default(false);

            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->json('questions')->nullable();

            $table->timestamp('facebook_created_at')->nullable();

            $table->timestamps();

            $table->index(['user_id', 'facebook_created_at']);
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
