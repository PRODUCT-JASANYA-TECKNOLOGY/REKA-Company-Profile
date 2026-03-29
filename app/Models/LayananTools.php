<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LayananTools extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'layanan_tools';

    protected $guarded = [];

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

    public function tools(): BelongsTo
    {
        return $this->belongsTo(Tools::class, 'tools_id');
    }
}
