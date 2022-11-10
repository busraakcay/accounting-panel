<?php

namespace App\Http\Livewire;

use App\Models\Expense;
use App\Models\Income;
use Carbon\Carbon;
use Livewire\Component;

class DashboardMounthlyReport extends Component
{
    public $startDate;
    public $finishDate;
    public $profitAndLoss;

    public function mount()
    {
        $this->startDate = Carbon::now()->format('Y-m-d');
        $this->finishDate = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        $incomes = Income::whereBetween('date', [
            $this->startDate,
            $this->finishDate
        ])->sum('amount');
        $expenses = Expense::whereBetween('date', [
            $this->startDate,
            $this->finishDate
        ])->sum('amount');
        $this->profitAndLoss = $incomes - $expenses;
        return view('livewire.dashboard-mounthly-report');
    }
}
