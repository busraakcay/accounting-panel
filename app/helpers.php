<?php

use App\Models\Bill;
use App\Models\Branch;
use App\Models\Expense;
use App\Models\Income;
use App\Models\PaidDebt;
use App\Models\Product;

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
        $calcDiff = $bill->total_paid_amount - paidDebt($billId);
        if ($calcDiff > 0) {
            return $calcDiff;
        } elseif ($calcDiff == 0) {
            return 0;
        } else {
            $bill->is_paid = 1;
            $bill->save();
            return 0;
        }
    }
}


if (!function_exists("getProducts")) {
    function getProducts($billId)
    {
        $products = Product::where('bill_id', $billId)->get();
        return $products;
    }
}

if (!function_exists("calculateBillTotal")) {
    function calculateBillTotal($billId)
    {
        $products = Product::where('bill_id', $billId)->get();
        $totalAmount = $products->sum('total_amount');
        $totalDiscountIncAmount = $products->sum('discount_inc_amount');
        $totalVATAmount = $products->sum('vat_amount');
        $totalAmountWithTaxes = $totalAmount + $totalVATAmount;
        $totalPaidAmount = $totalAmountWithTaxes - $totalDiscountIncAmount;

        $bill = Bill::findOrFail($billId);
        $bill->total_amount = $totalAmount;
        $bill->total_discount_inc_amount = $totalDiscountIncAmount;
        $bill->total_vat_amount = $totalVATAmount;
        $bill->total_amount_with_taxes = $totalAmountWithTaxes;
        $bill->total_paid_amount = $totalPaidAmount;
        $bill->update();

        if ($bill->bill_type == 1) {
            $makeExpenseName = $bill->company->name . " Fatura (" . $bill->bill_date->format('d.m.Y') . ")";
            $expense = Expense::where('bill_id', $billId)->first();
            $expenseAmount = $expense->amount;
            $saveExpense = Expense::where('bill_id', $billId)->update([
                'name' => $makeExpenseName,
                'amount' => $totalPaidAmount,
                'type_id' => 1,
                'bill_id' => $billId,
                'date' => date("Y-m-d"),
                'branch_id' => session()->get('branchId'),
            ]);
            if ($saveExpense) {
                updateCashAmount(session()->get('branchId'), $expenseAmount, 1);
                updateCashAmount(session()->get('branchId'), $totalPaidAmount, 0);
            }
        } else {
            $bill->is_paid = 0;
            $bill->save();
        }
    }
}

if (!function_exists("unformatPrice")) {
    function unformatPrice($formated)
    {
        $price = str_replace(".", "", $formated);
        return floatval(str_replace(",", ".", $price));
    }
}
