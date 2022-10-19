<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeType extends Model
{
    use HasFactory;

    protected $table = 'income_types';

    protected $guarded = [];

    public function incomes()
    {
        return $this->hasMany(Income::class, 'type_id', 'id');
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'type_id', 'id');
    }
}
