<?php

namespace App\Http\Livewire;

use App\Models\Bill;
use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class BillTable extends Component
{
    use WithPagination;
    public $search;
    public $productName, $companyName, $quantity, $quantityType, $unitPrice, $discountRateofInc, $discountIncAmount, $reasonforDiscountInc, $vatRate, $vatAmount, $otherTaxes, $totalAmount, $billDate, $billType;
    public $orderByCompany = null;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = array("delete");

    public function render()
    {
        return view('livewire.bill-table', [
            "bills" => Bill::when($this->orderByCompany, function ($query) {
                $query->where('company_id', $this->orderByCompany);
            })->where('product_name', 'like', '%' . trim($this->search) . '%')->orderBy('bill_date', 'desc')->paginate(20),
            "companies" => Company::get(),
        ]);
    }

    public function OpenBillViewModal($id)
    {
        $bill = Bill::find($id);
        $this->companyName = $bill->company->name;
        $this->billType = $bill->bill_type;
        $this->productName = $bill->product_name;
        $this->quantity = $bill->quantity;
        $this->quantityType = $bill->quantity_type;
        $this->unitPrice = $bill->unit_price;
        $this->discountRateofInc = $bill->discount_rateof_inc;
        $this->discountIncAmount = $bill->discount_inc_amount;
        $this->reasonforDiscountInc = $bill->reasonfor_discount_inc;
        $this->vatRate = $bill->vat_rate;
        $this->vatAmount = $bill->vat_amount;
        $this->otherTaxes = $bill->other_taxes;
        $this->totalAmount = $bill->total_amount;
        $this->billDate = $bill->bill_date->format('d.m.Y');
        $this->billId = $bill->id;
        $this->dispatchBrowserEvent('OpenBillViewModal', [
            'id' => $id
        ]);
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
        $bill = Bill::findOrFail($id);
        updateCashAmount(session()->get('branchId'), $bill->total_amount, 1);
        $delete = $bill->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('swal:deleted', [
                'title' => "Fatura Silindi",
                'text' => "Fatura başarıyla silindi.",
                'icon'  =>  'success',
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:deleteError', [
                'title' => "Fatura Silinemedi",
                'text' => "Fatura silinirken bir hata oluştu",
                'icon'  =>  'error',
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        }
    }
}
