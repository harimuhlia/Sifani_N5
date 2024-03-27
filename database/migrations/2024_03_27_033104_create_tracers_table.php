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
        Schema::create('tracers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('NISN');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('tahun_lulus');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->string('nama_ibu');
            $table->string('nama_ayah');
            $table->string('status_tempat_tinggal');
            $table->string('status_pernikahan');
            $table->string('status_bekerja');
            $table->string('status_study');
            $table->string('tempat_bekerja')->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('nama_usaha')->nullable();
            $table->string('lama_bekerja')->nullable();
            $table->string('pendapatan_kerja')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracers');
    }
};
