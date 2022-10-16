<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index');
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:companies,name',
            'description' => 'string',
        ]);

        $company = new Company();
        $company->name = $request->input('name');
        $company->description = $request->input('description');
        $company->save();

        return redirect()->route('company')->with('success', 'Firma başarıyla eklendi!');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit', compact('company'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'string',
        ]);

        $company = Company::findOrFail($id);
        $company->name = $request->input('name');
        $company->description = $request->input('description');

        $company->save();
        return redirect()->route('company')->with('success', 'Firma başarıyla güncellendi!');
    }


    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        if (!Company::where('id', $id)->exists()) {
            return redirect()->route('company')->with('success', 'Firma başarıyla silindi!');
        } else {
            return redirect()->back()->with('error', 'Firma silinirken bir hata oluştu.');
        }
    }

}
