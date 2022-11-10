<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use App\Models\IncomeType;
use Illuminate\Http\Request;

class BillTypeController extends Controller
{
    public function index()
    {
        return view('bill-type.index');
    }

    public function create()
    {
        return view('bill-type.create');
    }

    public function store(Request $request)
    {
        if ($request->billType == "1") {
            foreach ($request->option_group as $option) {
                if ($option["description"] != null) {
                    $billType = new IncomeType();
                    $billType->name = $option["description"];
                    $billType->save();
                }
            }
        } else {
            foreach ($request->option_group as $option) {
                if ($option["description"] != null) {
                    $billType = new ExpenseType();
                    $billType->name = $option["description"];
                    $billType->save();
                }
            }
        }
        return redirect()->route('bill-type')->with('success', 'Fatura tipi başarıyla eklendi!');
    }
}
