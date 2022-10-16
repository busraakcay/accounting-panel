<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;

class BranchTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.branch-table', [
            "branches" => Branch::paginate(20),
        ]);
    }
}
