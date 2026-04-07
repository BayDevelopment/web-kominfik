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
        Schema::create('partnerships', function (Blueprint $table) {
            $table->id();

            // DATA INSTANSI
            $table->string('instansi_nama');
            $table->string('instansi_email');
            $table->string('instansi_phone');

            // PIC
            $table->string('pic_name');

            // DESKRIPSI
            $table->text('deskripsi');

            // STATUS (tetap WAJIB walaupun guest)
            $table->enum('status', ['pending', 'approved', 'rejected'])
                ->default('pending');

            // 🔥 TAMBAHAN PENTING (buat kontrol admin)
            $table->timestamp('submitted_at')->useCurrent();

            // OPTIONAL (catatan admin)
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partnership');
    }
};
