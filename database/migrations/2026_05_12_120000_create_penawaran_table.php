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
        Schema::create('penawaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klient_id')->constrained('klient');
            $table->foreignId('bank_account_id')->constrained('bank_account');
            $table->string('nomor_penawaran', 128)->unique();
            $table->date('tanggal_pembuatan');
            $table->date('tanggal_jatuh_tempo');
            $table->json('items');
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->boolean('is_ppn')->default(false);
            $table->decimal('ppn', 15, 2)->default(0);
            $table->decimal('total_tagihan', 15, 2)->default(0);

            $this->base($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penawaran');
    }
};
