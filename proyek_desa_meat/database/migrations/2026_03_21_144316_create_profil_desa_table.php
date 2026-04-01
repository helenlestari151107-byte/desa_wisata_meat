<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('profil_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa')->default('Desa Wisata Meat');
            $table->text('sejarah')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('luas_wilayah')->nullable();
            $table->integer('jumlah_penduduk')->default(0);
            $table->integer('jumlah_kk')->default(0);
            $table->string('nama_kepala_desa')->nullable();
            $table->string('foto_kepala_desa')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('email_desa')->nullable();
            $table->string('alamat')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('profil_desa'); }
};