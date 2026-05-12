<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'bank_account';

    protected $guarded = [];

    public function penawarans(): HasMany
    {
        return $this->hasMany(Penawaran::class, 'bank_account_id');
    }
}
