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
        Schema::create('layanan_tools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->constrained('layanan');
            $table->foreignId('tools_id')->constrained('tools');

            $this->base($table);

            $table->unique(['layanan_id', 'tools_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_tools');
    }
};
