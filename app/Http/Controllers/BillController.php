<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Company;
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
            'otherTaxes' => 'required|string',
            'totalAmount' => 'required|numeric',
            'billDate' => 'required',
            'billType' => 'required',
        ]);

        $save = Bill::insert([
            'branch_id' => session()->get('branchId'),
            'company_id' => $request->input('company'),
            'bill_type' => $request->input('billType'),
            'product_name' => $request->input('productName'),
            'quantity' => $request->input('quantity'),
            'quantity_type' => $request->input('quantityType'),
            'unit_price' => $request->input('unitPrice'),
            'discount_rateof_inc' => $request->input('discountRateofInc'),
            'discount_inc_amount' => $request->input('discountIncAmount'),
            'reasonfor_discount_inc' => $request->input('reasonforDiscountInc'),
            'vat_rate' => $request->input('vatRate'),
            'vat_amount' => $request->input('vatAmount'),
            'other_taxes' => $request->input('otherTaxes'),
            'total_amount' => $request->input('totalAmount'),
            'bill_date' => $request->input('billDate'),
        ]);
        if ($save) {
            return redirect()->route('bill')->with('success', 'Fatura başarıyla eklendi!');
        } else {
            return redirect()->back()->with('error', 'Fatura eklenirken bir hata oluştu');
        }
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
            'otherTaxes' => 'required|string',
            'totalAmount' => 'required|numeric',
            'billDate' => 'required',
            'billType' => 'required',
        ]);

        $update = Bill::findOrFail($id)->update([
            'branch_id' => session()->get('branchId'),
            'company_id' => $request->input('company'),
            'bill_type' => $request->input('billType'),
            'product_name' => $request->input('productName'),
            'quantity' => $request->input('quantity'),
            'quantity_type' => $request->input('quantityType'),
            'unit_price' => $request->input('unitPrice'),
            'discount_rateof_inc' => $request->input('discountRateofInc'),
            'discount_inc_amount' => $request->input('discountIncAmount'),
            'reasonfor_discount_inc' => $request->input('reasonforDiscountInc'),
            'vat_rate' => $request->input('vatRate'),
            'vat_amount' => $request->input('vatAmount'),
            'other_taxes' => $request->input('otherTaxes'),
            'total_amount' => $request->input('totalAmount'),
            'bill_date' => $request->input('billDate'),
        ]);

        if ($update) {
            return redirect()->route('bill')->with('success', 'Fatura başarıyla güncellendi!');
        } else {
            return redirect()->route('bill')->with('success', 'Fatura güncellenirken bir hata oluştu');
        }
    }
}
