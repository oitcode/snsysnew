<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Worker;

class WorkerComponent extends Component
{
    public $workerCreateMode = false;
    public $workerDetailMode = false;
    public $displayingWorker = null;

    protected $listeners = [
        'exitWorkerCreateMode',
        'displayWorker' => 'displayWorker',
    ];

    public function render()
    {
        return view('livewire.worker-component');
    }

    public function enterWorkerCreateMode()
    {
        $this->clearMode();
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

    public function clearMode()
    {
        $this->workerCreateMode = false;
        $this->workerDetailMode = false;
    }

    public function enterWorkerDetailMode()
    {
        $this->workerDetailMode = true;
    }

    public function exitWorkerDetailMode()
    {
        $this->displayingWorker = null;
        $this->workerDetailMode = false;
    }

    public function displayWorker($workerId)
    {
        $this->clearMode();
        $this->displayingWorker = Worker::findOrFail($workerId);
        $this->workerDetailMode = true;
    }
}
