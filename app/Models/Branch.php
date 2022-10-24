<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = [
        'name',
        'amount_cash',
    ];

    public function bills()
    {
        return $this->hasMany(Bill::class, 'branch_id', 'id');
    }

    public function incomes()
    {
        return $this->hasMany(Income::class, 'branch_id', 'id');
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'branch_id', 'id');
    }

}
