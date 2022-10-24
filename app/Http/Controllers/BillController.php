<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Company;
use App\Models\Debt;
use App\Models\Expense;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        return view('bill.index');
    }

    public function create()
    {
        $companies = Company::get();
        return view('bill.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'productName' => 'required|string',
            'company' => 'required',
            'quantity' => 'required|numeric',
            'quantityType' => 'required|string',
            'unitPrice' => 'required|numeric',
            'discountRateofInc' => 'required|numeric',
            'discountIncAmount' => 'required|numeric',
            'reasonforDiscountInc' => 'required|string',
            'vatRate' => 'required|numeric',
            'vatAmount' => 'required|numeric',
            'totalAmount' => 'required|numeric',
            'billDate' => 'required',
            'billType' => 'required',
        ]);

        $bill = new Bill();
        $bill->branch_id = session()->get('branchId');
        $bill->company_id = $request->input('company');
        $bill->bill_type = $request->input('billType');
        $bill->product_name = $request->input('productName');
        $bill->quantity = $request->input('quantity');
        $bill->quantity_type = $request->input('quantityType');
        $bill->unit_price = $request->input('unitPrice');
        $bill->discount_rateof_inc = $request->input('discountRateofInc');
        $bill->discount_inc_amount = $request->input('discountIncAmount');
        $bill->reasonfor_discount_inc = $request->input('reasonforDiscountInc');
        $bill->vat_rate = $request->input('vatRate');
        $bill->vat_amount = $request->input('vatAmount');
        $bill->other_taxes = $request->input('otherTaxes');
        $bill->total_amount = $request->input('totalAmount');
        $bill->bill_date = $request->input('billDate');


        if ($request->input('billType') == 1) {
            $bill->is_paid = 1;
            $bill->save();
            $saveExpense = Expense::insert([
                'name' => $request->input('productName'),
                'amount' => $request->input('totalAmount'),
                'type_id' => 1,
                'bill_id' => $bill->id,
                'branch_id' => session()->get('branchId'),
            ]);
            if ($saveExpense) {
                updateCashAmount(session()->get('branchId'), $request->input('totalAmount'), 0);
            }
        } else {
            $bill->is_paid = 0;
            $bill->save();
        }


        return redirect()->route('bill')->with('success', 'Fatura başarıyla eklendi!');
    }

    public function edit($id)
    {
        $bill = Bill::findOrFail($id);
        $companies = Company::get();
        return view('bill.edit', compact('bill', 'companies'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'productName' => 'required|string',
            'company' => 'required',
            'quantity' => 'required|numeric',
            'quantityType' => 'required|string',
            'unitPrice' => 'required|numeric',
            'discountRateofInc' => 'required|numeric',
            'discountIncAmount' => 'required|numeric',
            'reasonforDiscountInc' => 'required|string',
            'vatRate' => 'required|numeric',
            'vatAmount' => 'required|numeric',
            'totalAmount' => 'required|numeric',
            'billDate' => 'required',
            'billType' => 'required',
        ]);

        $bill =  Bill::findOrFail($id);
        $bill->branch_id = session()->get('branchId');
        $bill->company_id = $request->input('company');
        $bill->bill_type = $request->input('billType');
        $bill->product_name = $request->input('productName');
        $bill->quantity = $request->input('quantity');
        $bill->quantity_type = $request->input('quantityType');
        $bill->unit_price = $request->input('unitPrice');
        $bill->discount_rateof_inc = $request->input('discountRateofInc');
        $bill->discount_inc_amount = $request->input('discountIncAmount');
        $bill->reasonfor_discount_inc = $request->input('reasonforDiscountInc');
        $bill->vat_rate = $request->input('vatRate');
        $bill->vat_amount = $request->input('vatAmount');
        $bill->other_taxes = $request->input('otherTaxes');
        $bill->total_amount = $request->input('totalAmount');
        $bill->bill_date = $request->input('billDate');


        if ($request->input('billType') == 1) {
            $bill->is_paid = 1;
            $bill->save();
            $expense = Expense::where('bill_id', $id)->first();
            $expenseAmount = $expense->amount;
            $saveExpense = Expense::where('bill_id', $id)->update([
                'name' => $request->input('productName'),
                'amount' => $request->input('totalAmount'),
                'type_id' => 1,
                'bill_id' => $id,
                'branch_id' => session()->get('branchId'),
            ]);
            if ($saveExpense) {
                updateCashAmount(session()->get('branchId'), $expenseAmount, 1);
                updateCashAmount(session()->get('branchId'), $request->input('totalAmount'), 0);
            }
        } else {
            $bill->is_paid = 0;
            $bill->save();
        }
        return redirect()->route('bill')->with('success', 'Fatura başarıyla güncellendi!');
    }
}
