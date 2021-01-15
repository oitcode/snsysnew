<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WorkerDetail extends Component
{
    public $worker;

    public function render()
    {
        return view('livewire.worker-detail');
    }
}
