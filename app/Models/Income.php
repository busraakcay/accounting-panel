<?php

namespace App\Models;

use App\Models\Scopes\BranchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $table = 'incomes';

    protected $guarded = [];

    protected $casts = [
        'date' => 'datetime'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new BranchScope);
    }

    public function incomeType()
    {
        return $this->belongsTo(IncomeType::class, 'type_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
