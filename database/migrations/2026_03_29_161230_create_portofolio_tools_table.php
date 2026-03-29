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
        Schema::create('portofolio_tools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portofolio_id')->constrained('portofolio');
            $table->foreignId('tools_id')->constrained('tools');

            $this->base($table);

            $table->unique(['portofolio_id', 'tools_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolio_tools');
    }
};
