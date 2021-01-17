<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Family;

class FamilyList extends Component
{
    public $families;

    public function mount()
    {
        $this->families = Family::all();
    }

    public function render()
    {
        return view('livewire.family-list');
    }
}
