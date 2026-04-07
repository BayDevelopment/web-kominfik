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
        Schema::create('registration_types', function (Blueprint $table) {
            $table->id();

            $table->string('name'); // tampil di UI (Member, Sponsor, dll)
            $table->string('slug')->unique(); // 🔥 untuk logic (member, sponsor, university)

            $table->boolean('is_open')->default(true);

            // 🔥 optional tapi penting (auto buka/tutup)
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();

            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_types');
    }
};
