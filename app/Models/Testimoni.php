<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimoni extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'testimoni';

    protected $guarded = [];

    public function klient(): BelongsTo
    {
        return $this->belongsTo(Klient::class, 'klient_id');
    }
}
