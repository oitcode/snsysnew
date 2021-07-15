<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Worker;
use App\Family;
use App\Oblate;
use App\Remittance;

class CounterComponent extends Component
{
    public $totalWorkers;
    public $totalFamilies;
    public $totalOblates;
    public $totalRemittances;
    public $totalDeposit;

    public function render()
    {
        $this->totalWorkers = Worker::count();
        $this->totalFamilies = Family::count();
        $this->totalOblates = Oblate::count();
        $this->totalRemittances = Remittance::count();
        $this->totalDeposit = $this->getTotalDeposit();

        return view('livewire.counter-component');
    }

    public function getTotalDeposit()
    {
        $total = 0;

        $remittances = Remittance::all();

        foreach ($remittances as $remittance) {
            $total += $remittance->total_amount;
        }

        return $total;
    }
}
