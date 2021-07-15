<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Remittance;

class RemittanceList extends Component
{
    public $remittances;

    public function render()
    {
        $this->remittances = Remittance::orderBy('remittance_id', 'DESC')->limit(5)->get();

        return view('livewire.remittance-list');
    }
}
