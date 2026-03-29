<?php

use App\Traits\BaseModelSoftDelete;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use BaseModelSoftDelete;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('portofolio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klient_id')->constrained('klient');
            $table->foreignId('category_id')->constrained('category');
            $table->string('slug', 255);
            $table->string('nama', 255);
            $table->text('deskripsi');
            $table->string('thumbnail', 255);
            $table->text('foto')->nullable();
            $table->date('tanggal_proyek');

            $this->base($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolio');
    }
};
