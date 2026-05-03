<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'company';

    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean',
        'tax_rate' => 'decimal:2',
        'nib' => 'integer',
    ];
}
