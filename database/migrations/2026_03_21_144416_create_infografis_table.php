<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('infografis', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('nilai');
            $table->string('ikon')->default('fas fa-chart-bar');
            $table->string('warna')->default('teal');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('infografis'); }
};
