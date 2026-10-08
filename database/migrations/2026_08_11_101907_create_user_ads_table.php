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
        Schema::create('user_ads', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('ad_link')->nullable();

            $table->string('company_name');
            $table->text('business_description');
            $table->string('website')->nullable();
            $table->string('city');
            $table->string('phone');

            $table->text('brand_information')->nullable();

            $table->string('logo')->nullable();
            $table->json('images')->nullable();
            $table->json('videos')->nullable();
            $table->string('voice_recording')->nullable();

            $table->text('video_ad_requirements')->nullable();
            $table->text('additional_notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
