<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSettings extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $showEditModal = false;


    public function render()
    {
        return view('livewire.admin-settings', [
            "users" => User::paginate(10),
        ]);
    }

    public function edit()
    {
        $this->showEditModal = true;
    }
}
