<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Family;

class FamilyComponent extends Component
{
    public $displayingFamily;
    public $familyDetailMode = false;

    protected $listeners = [
        //'exitWorkerCreateMode',
        'displayFamily' => 'displayFamily',
    ];

    public function render()
    {
        return view('livewire.family-component');
    }

    public function displayFamily($id)
    {
        $family = Family::findOrFail($id);

        $this->displayingFamily = $family;
        $this->enterDisplayMode();
    }

    public function enterDisplayMode()
    {
        $this->familyDetailMode = true;
    }

    public function exitDisplayMode()
    {
        $this->familyDetailMode = false;
    }
}
