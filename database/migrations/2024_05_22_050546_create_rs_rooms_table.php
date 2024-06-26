<?php

use App\Models\Hospital;
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
        Schema::create('rs_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospital_id');
            $table->enum('kelas_kamar', ['kelas 1', 'kelas 2', 'kelas 3', 'VIP', 'VVIP']);
            $table->integer('jumlah_kamar_terisi');
            $table->string('spesialisasi');
            $table->integer('jumlah_kamar_kosong');
            $table->enum('usia', ['anak-anak', 'dewasa']);
            $table->timestamps();

            $table->foreign('hospital_id')->references('id')->on('hospitals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rs_rooms');
    }
};
