<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Worker;

class WorkerList extends Component
{
    public $workers = null;

    public $searchToolboxDisplay = false;

    protected $listeners = [
        'workerAdded' => 'refreshList',
    ];

    public function mount()
    {
        $this->workers = Worker::all();
    }

    public function render()
    {
        return view('livewire.worker-list');
    }

    public function refreshList()
    {
        $this->workers = Worker::all();
    }

    public function showSearchToolbox()
    {
        $this->searchToolboxDisplay = true;
    }

    public function hideSearchToolbox()
    {
        $this->searchToolboxDisplay = false;
    }
}
