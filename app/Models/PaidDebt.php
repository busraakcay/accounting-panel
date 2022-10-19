<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidDebt extends Model
{
    use HasFactory;

    protected $table = 'paid_debts';

    protected $guarded = [];

    protected $casts = [
        'paid_date' => 'datetime'
    ];

    public function debt()
    {
        return $this->belongsTo(Debt::class, 'debt_id');
    }
}
