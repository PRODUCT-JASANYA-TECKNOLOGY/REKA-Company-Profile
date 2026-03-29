<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortofolioTools extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'portofolio_tools';

    protected $guarded = [];

    public function portofolio(): BelongsTo
    {
        return $this->belongsTo(Portofolio::class, 'portofolio_id');
    }

    public function tools(): BelongsTo
    {
        return $this->belongsTo(Tools::class, 'tools_id');
    }
}
