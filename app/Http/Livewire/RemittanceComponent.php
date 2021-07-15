<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Remittance;

class RemittanceComponent extends Component
{
    public $createMode = false;
    public $displayMode = false;
    public $displayingRemittance = null;

    protected $listeners = [
        'exitRemittanceCreateMode' => 'exitCreateMode',
        'displayRemittance',
    ];

    public function render()
    {
        return view('livewire.remittance-component');
    }

    public function enterCreateMode()
    {
        $this->createMode = true;
    }

    public function exitCreateMode()
    {
        $this->createMode = false;
    }

    public function enterDisplayMode()
    {
        $this->displayMode = true;
    }

    public function exitDisplayMode()
    {
        $this->displayingRemittance = null;
        $this->displayMode = false;
    }

    public function displayRemittance(Remittance $remittance)
    {
        $this->displayingRemittance = $remittance;
        $this->enterDisplayMode();
    }

    public function refreshOwn()
    {
        $this->createMode = false;
        $this->displayMode = false;
    }
}
