<?php

use App\Traits\BaseModelSoftDeleteDefault;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use BaseModelSoftDeleteDefault;

    public function up(): void
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 255)->unique();
            $table->string('judul', 255);
            $table->string('kategori', 128);
            $table->string('waktu_baca', 32);
            $table->string('thumbnail', 255);
            $table->text('excerpt');
            $table->longText('isi');
            $table->date('published_at');

            $this->base($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
