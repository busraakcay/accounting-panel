<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Expense;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create($billId)
    {
        return view('product.create', compact('billId'));
    }

    public function store(Request $request, $billId)
    {
        $request->validate([
            'productName' => 'required|string',
            'quantity' => 'required|numeric',
            'quantityType' => 'required|string',
            'unitPrice' => 'required',
            'discountRateofInc' => 'required|numeric',
            'discountIncAmount' => 'required',
            'vatRate' => 'required|numeric',
            'vatAmount' => 'required',
            'totalAmount' => 'required',
        ]);

        $product = new Product();
        $insert = $product->insert([
            'bill_id' => $billId,
            'name' =>  $request->input('productName'),
            'quantity' => $request->input('quantity'),
            'quantity_type' => $request->input('quantityType'),
            'unit_price' => unformatPrice($request->input('unitPrice')),
            'discount_rateof_inc' => $request->input('discountRateofInc'),
            'discount_inc_amount' => unformatPrice($request->input('discountIncAmount')),
            'reasonfor_discount_inc' => $request->input('reasonforDiscountInc'),
            'vat_rate' => $request->input('vatRate'),
            'vat_amount' => unformatPrice($request->input('vatAmount')),
            'other_taxes' => $request->input('otherTaxes'),
            'total_amount' => unformatPrice($request->input('totalAmount')),
        ]);

        if ($insert) {
            calculateBillTotal($billId);
            return redirect()->route('edit-bill', $billId)->with('success', "Ürün başarıyla eklendi.");
        } else {
            return redirect()->route('edit-bill', $billId)->with('error', "Ürün eklenirken bir hata oluştu");
        }
    }

    public function edit($id, $billId)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product', 'billId'));
    }

    public function update(Request $request, $id, $billId)
    {
        $request->validate([
            'productName' => 'required|string',
            'quantity' => 'required|numeric',
            'quantityType' => 'required|string',
            'unitPrice' => 'required',
            'discountRateofInc' => 'required|numeric',
            'discountIncAmount' => 'required',
            'vatRate' => 'required|numeric',
            'vatAmount' => 'required',
            'totalAmount' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $update = $product->update([
            'bill_id' => $billId,
            'name' =>  $request->input('productName'),
            'quantity' => $request->input('quantity'),
            'quantity_type' => $request->input('quantityType'),
            'unit_price' => unformatPrice($request->input('unitPrice')),
            'discount_rateof_inc' => $request->input('discountRateofInc'),
            'discount_inc_amount' => unformatPrice($request->input('discountIncAmount')),
            'reasonfor_discount_inc' => $request->input('reasonforDiscountInc'),
            'vat_rate' => $request->input('vatRate'),
            'vat_amount' => unformatPrice($request->input('vatAmount')),
            'other_taxes' => $request->input('otherTaxes'),
            'total_amount' => unformatPrice($request->input('totalAmount')),
        ]);

        if ($update) {
            calculateBillTotal($billId);
            return redirect()->route('edit-bill', $billId)->with('success', "Ürün başarıyla güncellendi.");
        } else {
            return redirect()->route('edit-bill', $billId)->with('error', "Ürün güncellenirken bir hata oluştu");
        }
    }

    public function destroy($id, $billId)
    {
        $product = Product::findOrFail($id);
        $delete = $product->delete();
        if ($delete) {
            calculateBillTotal($billId);
            return redirect()->route('edit-bill', $billId)->with('success', "Ürün başarıyla silindi.");
        } else {
            return redirect()->route('edit-bill', $billId)->with('error', "Ürün silinirken bir hata oluştu.");
        }
    }
}
