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
        Schema::create('bank_account', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name', 128);
            $table->string('account_number', 64);
            $table->string('account_holder_name', 255);
            $table->text('description')->nullable();

            $this->base($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_account');
    }
};
