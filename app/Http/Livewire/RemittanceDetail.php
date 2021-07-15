<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RemittanceDetail extends Component
{
    public $remittance = null;

    public function render()
    {
        return view('livewire.remittance-detail');
    }
}
