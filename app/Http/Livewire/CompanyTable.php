<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyTable extends Component
{
    use WithPagination;
    public $search;
    public $name, $description;
    public $upd_name, $upd_description, $upd_branchId;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = array("delete");


    public function render()
    {
        return view('livewire.company-table', [
            "companies" => Company::where('name', 'like', '%' . trim($this->search) . '%')->paginate(20),
        ]);
    }

    public function OpenCreateCompanyModal()
    {
        $this->name = '';
        $this->description = '';
        $this->dispatchBrowserEvent('OpenCreateCompanyModal');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
        ], [
            'name.required' => 'Ad alanı zorunludur.',
        ]);

        $save = Company::insert([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        if ($save) {
            $this->dispatchBrowserEvent('CloseCreateCompanyModal', [
                'title' => "İşlem Başarılı",
                'text' => "Yeni firma eklendi.",
                'timer'  => 800,
                'icon'  =>  'success',
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        }
    }

    public function OpenEditCompanyModal($id)
    {
        $info = Company::find($id);
        $this->upd_name = $info->name;
        $this->upd_description = $info->description;
        $this->upd_branchId = $info->id;
        $this->dispatchBrowserEvent('OpenEditCompanyModal', [
            'id' => $id
        ]);
    }

    public function update()
    {
        $id = $this->upd_branchId;

        $this->validate([
            'upd_name' => 'required|string',
        ], [
            'upd_name.required' => 'Ad alanı zorunludur.',
        ]);

        $update = Company::find($id)->update([
            'name' => $this->upd_name,
            'description' => $this->upd_description,
        ]);

        if ($update) {
            $this->dispatchBrowserEvent('CloseEditCompanyModal', [
                'title' => "İşlem Başarılı",
                'text' => "Firma başarıyla güncellendi.",
                'timer'  => 800,
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
            'timer'  => 800,
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
        $delete = Company::findOrFail($id)->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('swal:deleted', [
                'title' => "Firma Silindi",
                'text' => "Firma başarıyla silindi.",
                'icon'  =>  'success',
                'timer'  => 800,
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:deleteError', [
                'title' => "Firma Silinemedi",
                'text' => "Firma silinirken bir hata oluştu",
                'icon'  =>  'error',
                'timer'  => 800,
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        }
    }
}
