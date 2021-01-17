<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FamilyDetail extends Component
{
    public $family;

    public $editFamilyHeadFlag = false;
    public $familyHeadUpdatedName = '';

    public $editFamilyAddressFlag = false;
    public $familyUpdatedAddress = '';

    public function render()
    {
        return view('livewire.family-detail');
    }

    public function editFamilyHead()
    {
        $this->familyHeadUpdatedName = $this->family->family_head;
        $this->editFamilyHeadFlag = true;
    }

    public function updateFamilyHead()
    {
        $validatedData = $this->validate([
            'familyHeadUpdatedName' => 'required',
        ]);

        $validatedData['family_head'] = $validatedData['familyHeadUpdatedName'];
        $this->family->update($validatedData);

        session()->flash('message', 'Family Updated');
        $this->exitEditFamilyHeadMode();
    }

    public function exitEditFamilyHeadMode()
    {
        $this->familyHeadUpdatedName = '';
        $this->editFamilyHeadFlag = false;
    }

    public function editFamilyAddress()
    {
        $this->familyUpdatedAddress = $this->family->address;
        $this->editFamilyAddressFlag = true;
    }

    public function updateFamilyAddress()
    {
        $validatedData = $this->validate([
            'familyUpdatedAddress' => 'required',
        ]);

        $validatedData['address'] = $validatedData['familyUpdatedAddress'];
        $this->family->update($validatedData);

        session()->flash('message', 'Family Updated');
        $this->exitEditFamilyAddressMode();
    }

    public function exitEditFamilyAddressMode()
    {
        $this->familyUpdatedAddress = '';
        $this->editFamilyAddressFlag = false;
    }
}
