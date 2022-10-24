<?php

namespace App\Http\Livewire;

use App\Models\Bill;
use App\Models\Company;
use App\Models\Debt;
use App\Models\Expense;
use App\Models\PaidDebt;
use Livewire\Component;
use Livewire\WithPagination;

class DebtTable extends Component
{
    use WithPagination;
    public $paidAmount, $billId, $productName;
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
                ->where('product_name', 'like', '%' . trim($this->search) . '%')->orderBy('bill_date', 'desc')->orderBy('id', 'desc')->paginate(20),
            "companies" => Company::get(),
        ]);
    }

    public function OpenEditDebtModal($billId)
    {
        $bill = Bill::findOrFail($billId);
        $this->paidAmount = '';
        $this->billId = $billId;
        $this->productName = $bill->product_name;
        $this->dispatchBrowserEvent('OpenEditDebtModal', [
            'id' => $billId
        ]);
    }

    public function paidAmountUpdate()
    {
        $bill = Bill::findOrFail($this->billId);
        $this->validate([
            'paidAmount' => 'required|numeric',
        ]);

        $paidAmountSave = PaidDebt::insert([
            'paid_amount' => $this->paidAmount,
            'bill_id' => $bill->id,
        ]);

        Expense::insert([
            'name' => $bill->product_name,
            'amount' => $this->paidAmount,
            'type_id' => 1,
            'bill_id' => $bill->id,
            'branch_id' => session()->get('branchId'),
        ]);

        if ($paidAmountSave) {
            updateCashAmount(session()->get('branchId'), $this->paidAmount, 0);
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
