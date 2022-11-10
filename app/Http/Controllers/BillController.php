<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Company;
use App\Models\Expense;
use App\Models\Product;
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
            'company' => 'required',
            'billDate' => 'required',
            'billType' => 'required',
            'input_totalAmount' => 'required',
            'input_totalDiscount' => 'required',
            'input_totalVAT' => 'required',
            'input_totalAmountWithTaxes' => 'required',
            'input_paidAmount' => 'required',
        ],[
            'input_totalAmount.required' => 'Lütfen en az bir ürün giriniz.',
            'input_totalDiscount.required' => 'Lütfen en az bir ürün giriniz.',
            'input_totalVAT.required' => 'Lütfen en az bir ürün giriniz.',
            'input_totalAmountWithTaxes.required' => 'Lütfen en az bir ürün giriniz.',
            'input_paidAmount.required' => 'Lütfen en az bir ürün giriniz.',
        ]);

        try {
            $bill = new Bill();
            $bill->branch_id = session()->get('branchId');
            $bill->company_id = $request->input('company');
            $bill->bill_type = $request->input('billType');
            $bill->bill_date = $request->input('billDate');
            $bill->total_amount = $request->input('input_totalAmount');
            $bill->total_discount_inc_amount = $request->input('input_totalDiscount');
            $bill->total_vat_amount = $request->input('input_totalVAT');
            $bill->total_amount_with_taxes = $request->input('input_totalAmountWithTaxes');
            $bill->total_paid_amount = $request->input('input_paidAmount');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "Form bilgilerinde eksiklik bulunmaktadır.");
        }


        if ($request->input('billType') == 1) {
            $bill->is_paid = 1;
            $bill->save();
            $makeExpenseName = $bill->company->name . " Fatura (" . $bill->bill_date->format('d.m.Y') . ")";
            $saveExpense = Expense::insert([
                'name' => $makeExpenseName,
                'amount' => $request->input('input_totalAmount'),
                'type_id' => 1,
                'bill_id' => $bill->id,
                'date' => date("Y-m-d"),
                'branch_id' => session()->get('branchId'),
            ]);
            if ($saveExpense) {
                updateCashAmount(session()->get('branchId'), $request->input('input_totalAmount'), 0);
            }
        } else {
            $bill->is_paid = 0;
            $bill->save();
        }

        foreach ($request->option_group as $option) {
            if (
                $option["productName"] != null &&
                $option["quantity"] != null &&
                $option["quantityType"] != null &&
                $option["unitPrice"] != null &&
                $option["discountRateofInc"] != null &&
                $option["discountIncAmount"] != null &&
                $option["reasonforDiscountInc"] != null &&
                $option["vatRate"] != null &&
                $option["vatAmount"] != null &&
                $option["totalAmount"] != null
            ) {
                try {
                    $product = new Product();
                    $product->bill_id = $bill->id;
                    $product->name = $option["productName"];
                    $product->quantity = $option['quantity'];
                    $product->quantity_type = $option['quantityType'];
                    $product->unit_price = $option['unitPrice'];
                    $product->discount_rateof_inc = $option['discountRateofInc'];
                    $product->discount_inc_amount = $option['discountIncAmount'];
                    $product->reasonfor_discount_inc = $option['reasonforDiscountInc'];
                    $product->vat_rate = $option['vatRate'];
                    $product->vat_amount = $option['vatAmount'];
                    $product->other_taxes = $option['otherTaxes'];
                    $product->total_amount = $option['totalAmount'];
                    $product->save();
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error', $th->getMessage());
                }
            } else {
                return redirect()->back()->with('error', "Form bilgilerinde eksiklik bulunmaktadır.");
            }
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
