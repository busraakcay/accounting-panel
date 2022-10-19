<?php

namespace App\Http\Livewire;

use App\Models\Expense;
use App\Models\ExpenseType;
use Livewire\Component;
use Livewire\WithPagination;

class ExpenseTable extends Component
{
    use WithPagination;
    public $search;
    public $name, $amount, $expenseType, $description;
    public $upd_name, $upd_amount, $upd_expenseType, $upd_expenseId, $upd_description;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = array("delete");

    public function render()
    {
        return view('livewire.expense-table', [
            "expenses" => Expense::where('name', 'like', '%' . trim($this->search) . '%')->paginate(20),
            "expenseTypes" => ExpenseType::get(),
        ]);
    }

    public function OpenCreateExpenseModal()
    {
        $this->name = '';
        $this->amount = '';
        $this->expenseType = '';
        $this->description = '';
        $this->dispatchBrowserEvent('OpenCreateExpenseModal');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'expenseType' => 'required',
        ], [
            'name.required' => 'Ad alanı zorunludur.',
            'amount.required' => 'Miktar alanı zorunludur.',
            'expenseType.required' => 'Tür seçimi zorunludur.',
        ]);

        $save = Expense::insert([
            'name' => $this->name,
            'amount' => $this->amount,
            'type_id' => $this->expenseType,
            'branch_id' => session()->get('branchId'),
            'description' => $this->description,
        ]);

        if ($save) {
            updateCashAmount(session()->get('branchId'), $this->amount, 0);
            $this->dispatchBrowserEvent('CloseCreateExpenseModal', [
                'title' => "İşlem Başarılı",
                'text' => "Yeni gider eklendi.",
                'icon'  =>  'success',
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        }
    }

    public function OpenEditExpenseModal($id)
    {
        $info = Expense::find($id);
        $this->upd_name = $info->name;
        $this->upd_amount = $info->amount;
        $this->upd_expenseType = $info->type_id;
        $this->upd_description = $info->description;
        $this->upd_expenseId = $info->id;
        $this->dispatchBrowserEvent('OpenEditExpenseModal', [
            'id' => $id
        ]);
    }

    public function update()
    {
        $id = $this->upd_expenseId;
        $this->validate([
            'upd_name' => 'required|string',
            'upd_amount' => 'required|numeric',
            'upd_expenseType' => 'required',
        ], [
            'upd_name.required' => 'Ad alanı zorunludur.',
            'upd_amount.required' => 'Miktar alanı zorunludur.',
            'upd_expenseType.required' => 'Tür seçimi zorunludur.',
        ]);

        $expense = Expense::findOrFail($id);
        $oldExpenseAmount = $expense->amount;
    
        $update = $expense->update([
            'name' => $this->upd_name,
            'amount' => $this->upd_amount,
            'type_id' => $this->upd_expenseType,
            'branch_id' => session()->get('branchId'),
            'description' => $this->upd_description,
        ]);

        if ($update) {
            updateCashAmount(session()->get('branchId'), $oldExpenseAmount, 1);
            updateCashAmount(session()->get('branchId'), $this->upd_amount, 0);
            $this->dispatchBrowserEvent('CloseEditExpenseModal', [
                'title' => "İşlem Başarılı",
                'text' => "Gider başarıyla güncellendi.",
                'icon'  =>  'success',
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        }
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => "Emin misiniz?",
            'text' => "Bu işlemi geri alamayacaksınız.",
            'icon'  =>  'warning',
            'showCancelButton'  =>  true,
            'confirmButtonColor'  =>  '#3085d6',
            'cancelButtonColor'  =>  '#d33',
            'cancelButtonText'  =>  'İptal',
            'confirmButtonText'  =>  'Evet',
            'id' => $id
        ]);
    }

    public function delete($id)
    {
        $expense = Expense::findOrFail($id);
        updateCashAmount(session()->get('branchId'), $expense->amount, 1);
        $delete = $expense->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('swal:deleted', [
                'title' => "Gider Silindi",
                'text' => "Gider başarıyla silindi.",
                'icon'  =>  'success',
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:deleteError', [
                'title' => "Gider Silinemedi",
                'text' => "Gider silinirken bir hata oluştu",
                'icon'  =>  'error',
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        }
    }

}
