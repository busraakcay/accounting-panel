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
    public $productName,
        $billId,
        $companyName,
        $quantity,
        $quantityType, $unitPrice,
        $discountRateofInc, $discountIncAmount,
        $reasonforDiscountInc, $vatRate, $vatAmount, $otherTaxes,
        $totalAmount, $billDate, $billType,
        $billTotalAmount,
        $totalDiscountIncAmount,
        $totalVATAmount,
        $totalAmountWithTaxes,
        $totalPaidAmount;
    public $orderByCompany = null;
    public $orderByBillType = null;
    public $startDate;
    public $finishDate;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = array("delete");

    public function render()
    {
        return view('livewire.bill-table', [
            "bills" => Bill::when($this->orderByCompany, function ($query) {
                $query->where('company_id', $this->orderByCompany);
            })
                ->when($this->orderByBillType, function ($query) {
                    $query->where('bill_type', $this->orderByBillType);
                })
                ->when($this->startDate, function ($query) {
                    $query->whereBetween('bill_date', [
                        $this->startDate,
                        $this->finishDate
                    ]);
                })
                ->when($this->finishDate, function ($query) {
                    $query->whereBetween('bill_date', [
                        $this->startDate,
                        $this->finishDate
                    ]);
                })
                ->orderBy('bill_date', 'desc')->orderBy('id', 'desc')->paginate(20),
            "companies" => Company::get(),
        ]);
    }

    public function OpenBillViewModal($id)
    {
        $bill = Bill::find($id);
        $this->billId = $bill->id;
        $this->companyName = $bill->company->name;
        $this->billType = $bill->bill_type;
        $this->billDate = $bill->bill_date->format('d.m.Y');
        $this->billTotalAmount = $bill->total_amount;
        $this->totalDiscountIncAmount = $bill->total_discount_inc_amount;
        $this->totalVATAmount = $bill->total_vat_amount;
        $this->totalAmountWithTaxes = $bill->total_amount_with_taxes;
        $this->totalPaidAmount = $bill->total_paid_amount;
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
                'timer'  => 800,
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:deleteError', [
                'title' => "Fatura Silinemedi",
                'text' => "Fatura silinirken bir hata oluştu",
                'icon'  =>  'error',
                'timer'  => 800,
                'showConfirmButton'  => false,
                'showCancelButton'  =>  false,
            ]);
        }
    }
}
