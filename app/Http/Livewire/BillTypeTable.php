<?php

namespace App\Http\Livewire;

use App\Models\ExpenseType;
use App\Models\IncomeType;
use Livewire\Component;

class BillTypeTable extends Component
{
    public $billTypeName, $billTypeId, $billType;
    protected $listeners = array("delete");

    public function render()
    {
        return view('livewire.bill-type-table', [
            "incomeTypes" => IncomeType::all(),
            "expenseTypes" => ExpenseType::all(),
        ]);
    }

    public function OpenEditBillTypeModal($id, $type)
    {
        $this->billType = $type;
        if ($type == 1) {
            $billType = IncomeType::find($id);
            $this->billTypeName = $billType->name;
            $this->billTypeId = $billType->id;
        } else {
            $billType = ExpenseType::find($id);
            $this->billTypeName = $billType->name;
            $this->billTypeId = $billType->id;
        }
        $this->dispatchBrowserEvent('OpenEditBillTypeModal', [
            'id' => $id,
            'type' => $type,
        ]);
    }

    public function update()
    {
        $id = $this->billTypeId;
        $type = $this->billType;

        $this->validate([
            'billTypeName' => 'required',
        ], [
            'billTypeName.required' => 'Bu alan zorunludur.',
        ]);

        if ($type == 1) {
            $update = IncomeType::find($id)->update([
                'name' => $this->billTypeName,
            ]);
        } else {
            $update = ExpenseType::find($id)->update([
                'name' => $this->billTypeName,
            ]);
        }

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditBillTypeModal');
        }
    }

    public function deleteConfirm($id, $type)
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
            'id' => $id,
            'type' => $type,
        ]);
    }

    public function delete($id, $type)
    {
        if ($type == '1') {
            $delete = IncomeType::findOrFail($id)->delete();
        } else {
            $delete = ExpenseType::findOrFail($id)->delete();
        }
        if ($delete) {
            $this->dispatchBrowserEvent('swal:deleted', [
                'title' => "Fatura Türü Silindi",
                'text' => "Fatura Türü başarıyla silindi.",
                'icon'  =>  'success',
                'timer'  => 800,
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:deleteError', [
                'title' => "Fatura Türü Silinemedi",
                'text' => "Fatura Türü silinirken bir hata oluştu",
                'icon'  =>  'error',
                'timer'  => 800,
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        }
    }
}
