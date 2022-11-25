<?php

namespace App\Http\Livewire;

use App\Models\Bill;
use App\Models\Company;
use App\Models\Expense;
use App\Models\PaidDebt;
use Livewire\Component;
use Livewire\WithPagination;

class DebtTable extends Component
{
    use WithPagination;
    public $paidAmount, $billId, $companyName;
    public $search;
    public $orderByCompany = null;
    public $filterByPaid = null;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.debt-table', [
            "debts" => Bill::where('bill_type', 2)
                ->when($this->orderByCompany, function ($query) {
                    $query->where('company_id', $this->orderByCompany);
                })
                ->when($this->filterByPaid, function ($query) {
                    if ($this->filterByPaid == 1) {
                        $query->where('is_paid', 0);
                    } else {
                        $query->where('is_paid', 1);
                    }
                })
                ->where('total_paid_amount', '>=', trim($this->search))
                ->orderBy('bill_date', 'desc')->orderBy('id', 'desc')->paginate(20),
            "totalDebt" =>  Bill::where('bill_type', 2)->when($this->orderByCompany, function ($query) {
                $query->where('company_id', $this->orderByCompany);
            })->sum("total_paid_amount"),
            "paidDebt" => PaidDebt::when($this->orderByCompany, function ($query) {
                $query->where('company_id', $this->orderByCompany);
            })->sum('paid_amount'),
            "companies" => Company::get(),
        ]);
    }

    public function OpenEditDebtModal($billId)
    {
        $bill = Bill::findOrFail($billId);
        $this->paidAmount = '';
        $this->billId = $billId;
        $this->companyName = $bill->company->name;
        $this->dispatchBrowserEvent('OpenEditDebtModal', [
            'id' => $billId
        ]);
    }

    public function paidAmountUpdate()
    {
        $bill = Bill::findOrFail($this->billId);
        $this->validate([
            'paidAmount' => 'required',
        ], [
            'paidAmount.required' => 'Bu alan zorunludur.',
        ]);

        $paidAmountSave = PaidDebt::insert([
            'paid_amount' => unformatPrice($this->paidAmount),
            'company_id' => $bill->company_id,
            'bill_id' => $bill->id,
        ]);
        $makeExpenseName = $bill->company->name . " Fatura (" . $bill->bill_date->format('d.m.Y') . ")";
        Expense::insert([
            'name' => $makeExpenseName,
            'amount' => unformatPrice($this->paidAmount),
            'type_id' => 1,
            'bill_id' => $bill->id,
            'branch_id' => session()->get('branchId'),
            'date' => date("Y-m-d"),
            'description' => date("d.m.Y") . " tarihinde ödendi."
        ]);

        if ($paidAmountSave) {
            updateCashAmount(session()->get('branchId'), unformatPrice($this->paidAmount), 0);
            $this->dispatchBrowserEvent('CloseEditDebtModal', [
                'title' => "İşlem Başarılı",
                'icon'  =>  'success',
                'timer'  => 800,
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        }
    }
}
