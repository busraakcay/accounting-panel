<?php

use App\Models\Bill;
use App\Models\Branch;
use App\Models\Debt;
use App\Models\Expense;
use App\Models\Income;
use App\Models\PaidDebt;

if (!function_exists("checkPasswords")) {
    function checkPasswords($password, $repassword)
    {
        if ($password == $repassword) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists("getBranchName")) {
    function getBranchName()
    {
        if (!session()->has('branchName')) {
            $branch = Branch::where('id', 1)->first();
            session()->put('branchName', $branch->name);
            session()->put('branchId', $branch->id);
            session()->save();
        }
        return session()->get('branchName');
    }
}

if (!function_exists("updateCashAmount")) {
    function updateCashAmount($branchId, $amount, $transactionType)
    {
        $branch = Branch::findOrFail($branchId);
        $branch->name = $branch->name;
        if ($transactionType == 1) { // 1 ise nakit parayı arttır.
            $branch->amount_cash = $branch->amount_cash + $amount;
        } else {
            $branch->amount_cash = $branch->amount_cash - $amount;
        }
        $branch->update();
    }
}

if (!function_exists("paidDebt")) {
    function paidDebt($billId)
    {
        $paidDebt = PaidDebt::where('bill_id', $billId)->get();
        $paidDebtSum = $paidDebt->sum('paid_amount');
        return $paidDebtSum;
    }
}

if (!function_exists("remainDebt")) {
    function remainDebt($billId)
    {
        $bill = Bill::findOrFail($billId);
        $calcDiff = $bill->total_amount - paidDebt($billId);
        if ($calcDiff > 0) {
            return $calcDiff;
        } else {
            $bill->is_paid = 1;
            $bill->save();
            return 0;
        }
    }
}

if (!function_exists("calculateDayMoney")) {
    function calculateDayMoney()
    {
        $incomes = Income::get()->sum('amount');
        $expenses = Expense::get()->sum('amount');
        return $incomes - $expenses;
    }
}
