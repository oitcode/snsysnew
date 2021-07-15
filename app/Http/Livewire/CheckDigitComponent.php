<?php

namespace App\Http\Livewire;

use App\Traits\MiscTrait;

use Livewire\Component;

class CheckDigitComponent extends Component
{
    use MiscTrait;

    public $tenDFamCode; 
    public $valid = false; 
    public $displayResult1 = false;

    public $nineDFamCode; 
    public $checkDigit;
    public $displayResult2 = false;

    public function render()
    {
        return view('livewire.check-digit-component');
    }

    public function checkIfValid()
    {
        if ($this->isValidTenDFamCode($this->tenDFamCode)) {
            $this->valid = true;
        } else {
            $this->valid = false;
        }

        $this->displayResult1 = true;
    }

    public function getCheckDigit()
    {
        $this->checkDigit = $this->familyCodeCheckDigit($this->nineDFamCode);
        $this->displayResult2 = true;
    }

    public function resetInputFields()
    {
        $this->tenDFamCode = "";
        $this->valid = false;
        $this->displayResult1 = false;

        $this->nineDFamCode = "";
        $this->checkdigit = "";
        $this->displayResult2 = false;
    }
}
