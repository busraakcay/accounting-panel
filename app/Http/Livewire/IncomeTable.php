<?php

namespace App\Http\Livewire;

use App\Models\Income;
use App\Models\IncomeType;
use Livewire\Component;
use Livewire\WithPagination;

class IncomeTable extends Component
{
    use WithPagination;
    public $search;
    public $name, $amount, $incomeType, $description;
    public $orderByType = null;
    public $upd_name, $upd_amount, $upd_incomeType, $upd_incomeId, $upd_description;
    public $startDate;
    public $finishDate;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = array("delete");

    public function render()
    {
        return view('livewire.income-table', [
            "incomes" => Income::when($this->orderByType, function ($query) {
                $query->where('type_id', $this->orderByType);
            })
                ->when($this->startDate, function ($query) {
                    $query->whereBetween('date', [
                        $this->startDate,
                        $this->finishDate
                    ]);
                })
                ->when($this->finishDate, function ($query) {
                    $query->whereBetween('date', [
                        $this->startDate,
                        $this->finishDate
                    ]);
                })->where('name', 'like', '%' . trim($this->search) . '%')->orderBy('id', 'desc')->paginate(20),
            "incomeTypes" => IncomeType::get(),
        ]);
    }

    public function OpenCreateIncomeModal()
    {
        $this->name = '';
        $this->amount = '';
        $this->incomeType = '';
        $this->description = '';
        $this->dispatchBrowserEvent('OpenCreateIncomeModal');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'amount' => 'required',
            'incomeType' => 'required',
        ], [
            'name.required' => 'Ad alanı zorunludur.',
            'amount.required' => 'Miktar alanı zorunludur.',
            'incomeType.required' => 'Tür seçimi zorunludur.',
        ]);

        $save = Income::insert([
            'name' => $this->name,
            'amount' => unformatPrice($this->amount),
            'type_id' => $this->incomeType,
            'branch_id' => session()->get('branchId'),
            'date' => date("Y-m-d"),
            'description' => $this->description,
        ]);

        if ($save) {
            updateCashAmount(session()->get('branchId'), unformatPrice($this->amount), 1);
            $this->dispatchBrowserEvent('CloseCreateIncomeModal', [
                'title' => "İşlem Başarılı",
                'text' => "Yeni gelir eklendi.",
                'icon'  =>  'success',
                'timer'  => 800,
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        }
    }

    public function OpenEditIncomeModal($id)
    {
        $info = Income::find($id);
        $this->upd_name = $info->name;
        $this->upd_amount = $info->amount;
        $this->upd_incomeType = $info->type_id;
        $this->upd_description = $info->description;
        $this->upd_incomeId = $info->id;
        $this->dispatchBrowserEvent('OpenEditIncomeModal', [
            'id' => $id
        ]);
    }

    public function update()
    {
        $id = $this->upd_incomeId;
        $this->validate([
            'upd_name' => 'required',
            'upd_amount' => 'required',
            'upd_incomeType' => 'required',
        ], [
            'upd_name.required' => 'Ad alanı zorunludur.',
            'upd_amount.required' => 'Miktar alanı zorunludur.',
            'upd_incomeType.required' => 'Tür seçimi zorunludur.',
        ]);

        $income = Income::findOrFail($id);
        $oldIncomeAmount = $income->amount;

        $update = $income->update([
            'name' => $this->upd_name,
            'amount' => unformatPrice($this->upd_amount),
            'type_id' => $this->upd_incomeType,
            'branch_id' => session()->get('branchId'),
            'date' => date("Y-m-d"),
            'description' => $this->upd_description,
        ]);

        if ($update) {
            updateCashAmount(session()->get('branchId'), $oldIncomeAmount, 0);
            updateCashAmount(session()->get('branchId'), unformatPrice($this->upd_amount), 1);
            $this->dispatchBrowserEvent('CloseEditIncomeModal', [
                'title' => "İşlem Başarılı",
                'text' => "Gelir başarıyla güncellendi.",
                'icon'  =>  'success',
                'timer'  => 800,
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
        $income = Income::findOrFail($id);
        updateCashAmount(session()->get('branchId'), $income->amount, 0);
        $delete = $income->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('swal:deleted', [
                'title' => "Gelir Silindi",
                'text' => "Gelir başarıyla silindi.",
                'icon'  =>  'success',
                'timer'  => 800,
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:deleteError', [
                'title' => "Gelir Silinemedi",
                'text' => "Gelir silinirken bir hata oluştu",
                'icon'  =>  'error',
                'timer'  => 800,
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        }
    }
}
