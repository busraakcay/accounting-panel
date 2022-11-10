<?php

namespace App\Models;

use App\Models\Scopes\BranchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $guarded = [];

    protected $casts = [
        'bill_date' => 'datetime'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new BranchScope);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function paidDebts()
    {
        return $this->hasMany(PaidDebt::class, 'id', 'bill_id');
    }
    
    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'bill_id');
    }
}
