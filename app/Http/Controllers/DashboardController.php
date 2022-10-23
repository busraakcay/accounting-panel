<?php
//php artisan make:controller PhotoController --resource
namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Branch;
use App\Models\Company;
use App\Models\Debt;
use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchCount = count(Branch::get());
        $companyCount = count(Company::get());
        $billCount = count(Bill::get());
        $debtCount = count(Debt::where('is_paid', 0)->get());
        $incomeCount = count(Income::get());
        $expenseCount = count(Expense::get());
        return view('dashboard.index', compact('branchCount', 'companyCount', 'billCount', 'debtCount', 'incomeCount', 'expenseCount'));
    }


    public function keepBranch(Request $request, $branchId)
    {
        try {
            if (isset($branchId) || $branchId == null) {
                $branch = Branch::where('id', $branchId)->first();
                $request->session()->put('branchName', $branch->name);
                $request->session()->put('branchCash', $branch->amount_cash);
                $request->session()->put('branchId', $branch->id);
                $request->session()->save();
                return redirect()->back();
            } else {
                $branch = Branch::where('id', 1)->first();
                $request->session()->put('branchName', $branch->name);
                $request->session()->put('branchCash', $branch->amount_cash);
                $request->session()->put('branchId', $branch->id);
                $request->session()->save();
            }
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
