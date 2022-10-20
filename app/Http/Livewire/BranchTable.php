<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;

class BranchTable extends Component
{
    use WithPagination;
    public $name, $amount;
    public $upd_name, $upd_amount, $upd_branchId;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = array("delete");

    public function render()
    {
        return view('livewire.branch-table', [
            "branches" => Branch::paginate(20),
        ]);
    }

    public function OpenCreateBranchModal()
    {
        $this->name = '';
        $this->amount = '';
        $this->dispatchBrowserEvent('OpenCreateBranchModal');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'amount' => 'required|numeric',
        ], [
            'name.required' => 'Ad alanı zorunludur.',
            'amount.required' => 'Miktar alanı zorunludur.',
        ]);

        $save = Branch::insert([
            'name' => $this->name,
            'amount_cash' => $this->amount,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseCreateBranchModal', [
                'title' => "İşlem Başarılı",
                'text' => "Yeni şube eklendi.",
                'icon'  =>  'success',
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        }
    }

    public function OpenEditBranchModal($id)
    {
        $info = Branch::find($id);
        $this->upd_name = $info->name;
        $this->upd_amount = $info->amount_cash;
        $this->upd_branchId = $info->id;
        $this->dispatchBrowserEvent('OpenEditBranchModal', [
            'id' => $id
        ]);
    }

    public function update()
    {
        $id = $this->upd_branchId;

        $this->validate([
            'upd_name' => 'required|string',
            'upd_amount' => 'required|numeric',
        ], [
            'upd_name.required' => 'Ad alanı zorunludur.',
            'upd_amount.required' => 'Miktar alanı zorunludur.',
        ]);
    
        $update = Branch::find($id)->update([
            'name' => $this->upd_name,
            'amount_cash' => $this->upd_amount,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditBranchModal', [
                'title' => "İşlem Başarılı",
                'text' => "Şube başarıyla güncellendi.",
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
        $delete = Branch::findOrFail($id)->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('swal:deleted', [
                'title' => "Şube Silindi",
                'text' => "Şube başarıyla silindi.",
                'icon'  =>  'success',
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:deleteError', [
                'title' => "Şube Silinemedi",
                'text' => "Şube silinirken bir hata oluştu",
                'icon'  =>  'error',
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        }
    }
}
