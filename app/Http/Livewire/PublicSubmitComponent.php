<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PublicSubmitComponent extends Component
{
    public $totalNumOfRows = 1;

    public $remittanceLines = array();

    public function render()
    {
        return view('livewire.public-submit-component');
    }

    public function addRow()
    {
        $this->totalNumOfRows++;
    }

    public function clearSheet()
    {
        for ($i=0; $i < $this->totalNumOfRows; $i++) {
            $this->remittanceLines[$i]['istavrity'] = null;
            $this->remittanceLines[$i]['swastyayani'] = null;
            $this->remittanceLines[$i]['acharyavrity'] = null;
            $this->remittanceLines[$i]['dakshina'] = null;
            $this->remittanceLines[$i]['sangathani'] = null;
            $this->remittanceLines[$i]['ritwiki'] = null;
            $this->remittanceLines[$i]['pranami'] = null;
            $this->remittanceLines[$i]['swastyayani_awasista'] = null;
            $this->remittanceLines[$i]['ananda_bazar'] = null;
            $this->remittanceLines[$i]['parivrity'] = null;
            $this->remittanceLines[$i]['misc'] = null;
            $this->remittanceLines[$i]['utsav'] = null;
            $this->remittanceLines[$i]['diksha_pranami'] = null;
            $this->remittanceLines[$i]['acharya_pranami'] = null;
        }
    }
}
