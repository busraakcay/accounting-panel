<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyTable extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        return view('livewire.company-table', [
            "companies" => Company::where('name', 'like', '%' . trim($this->search) . '%')->paginate(20),
        ]);
    }
}
