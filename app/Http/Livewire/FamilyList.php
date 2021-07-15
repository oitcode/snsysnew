<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Family;

class FamilyList extends Component
{
    public $families;

    public function mount()
    {
        $this->families = Family::orderBy('family_id', 'DESC')->limit(5)->get();
    }

    public function render()
    {
        return view('livewire.family-list');
    }
}
