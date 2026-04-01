<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kontak extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'kontak';
    protected $guarded = [];
}
