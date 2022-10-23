<?php

use App\Models\Bill;
use App\Models\Branch;
use App\Models\Debt;
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
    function paidDebt($debtId)
    {
        $paidDebt = PaidDebt::where('debt_id', $debtId)->get();
        $paidDebtSum = $paidDebt->sum('paid_amount');
        return $paidDebtSum;
    }
}
if (!function_exists("remainDebt")) {
    function remainDebt($debtId)
    {
        $debt = Debt::findOrFail($debtId);
        $bill = Bill::where('id', $debt->bill_id)->first();
        $calcDiff = $bill->total_amount - paidDebt($debtId);
        if ($calcDiff >= 0) {
            return $calcDiff;
        } else {
            $debt->is_paid = 1;
            $debt->save();
            return 0;
        }
    }
}
