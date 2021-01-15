<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WorkerComponent extends Component
{
    public $workerCreateMode = false;

    protected $listeners = [
        'exitWorkerCreateMode',
    ];

    public function render()
    {
        return view('livewire.worker-component');
    }

    public function enterWorkerCreateMode()
    {
        $this->workerCreateMode = true;
    }

    public function exitWorkerCreateMode()
    {
        $this->workerCreateMode = false;
    }

    public function create()
    {
        $this->enterWorkerCreateMode();
    }
}
