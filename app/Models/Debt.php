<?php

namespace App\Models;

use App\Models\Scopes\BranchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    protected $table = 'debts';

    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope(new BranchScope);
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function paidDebts()
    {
        return $this->hasMany(PaidDebt::class, 'id', 'debt_id');
    }
}
