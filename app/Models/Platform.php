<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Platform extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'platform';

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'sosial_media' => 'array',
            'sertifikat' => 'array',
        ];
    }
}
