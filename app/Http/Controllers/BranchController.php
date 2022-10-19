<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        return view('branch.index');
    }

    public function create()
    {
        return view('branch.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'amountCash' => 'required|numeric',
        ]);

        $branch = new Branch();
        $branch->name = $request->input('name');
        $branch->amount_cash = $request->input('amountCash');
        $branch->save();

        return redirect()->route('branch')->with('success', 'Şube başarıyla eklendi!');
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        return view('branch.edit', compact('branch'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'amountCash' => 'required|numeric',
        ]);

        $branch = Branch::findOrFail($id);
        $branch->name = $request->input('name');
        $branch->amount_cash = $request->input('amountCash');
        $branch->save();
        return redirect()->route('branch')->with('success', 'Şube başarıyla güncellendi!');
    }

}
