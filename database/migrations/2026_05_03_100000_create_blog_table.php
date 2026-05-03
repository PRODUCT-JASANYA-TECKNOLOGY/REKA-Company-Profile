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
            $table->foreignId('category_id')->constrained('category');
            $table->string('slug', 255)->unique();
            $table->string('title', 255);
            $table->text('excerpt');
            $table->longText('content');
            $table->text('image')->nullable();

            $this->base($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
