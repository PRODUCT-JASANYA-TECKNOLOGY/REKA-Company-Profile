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
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('logo')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('whatsapp_number', 32)->nullable();
            $table->decimal('tax_rate', 5, 2)->nullable();
            $table->unsignedBigInteger('nib')->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();

            $this->base($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};
