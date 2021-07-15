<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Traits\MiscTrait;

use App\Family;
use App\Worker;

class WorkerCreate extends Component
{
    use MiscTrait;

    public $name;
    public $family_code;
    public $address;
    public $email;
    public $contact_number;
    public $country = 'Nepal';

    public $citizenship_number;
    public $pan_number;

    public $diksha_date;
    public $ritwik_name;
    public $swastyayani_date;

    public $worker_type;
    public $panja_issue_date;
    public $last_panja_renew_date;
    public $next_panja_renew_date;

    public $comment;

    public function render()
    {
        return view('livewire.worker-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'family_code' => 'required|unique:family,family_code',
            'address' => 'required',
            'email' => 'nullable|email',
            'contact_number' => 'required|regex:/^[0-9]*$/',
            'country' => 'required',

            'citizenship_number' => 'nullable',
            'pan_number' => 'nullable',

            'diksha_date' => 'required|date',
            'ritwik_name' => 'required',
            'swastyayani_date' => 'required|date',

            'worker_type' => 'required',
            'panja_issue_date' => 'required|date',
            'last_panja_renew_date' => 'required|date',
            'next_panja_renew_date' => 'required|date',

            'comment' => 'nullable',
        ]);


        /*
         * Check if family code is valid
         */

        $tenDFamCode = $validatedData['family_code'];
	      $nineDFamCode = substr($tenDFamCode, 0, 9);
	      $checkDigit = substr($tenDFamCode, 9, 1);

        if ($this->familyCodeCheckDigit($nineDFamCode) == -1) {
            session()->flash('message', 'Family Code Not Valid.' . $validatedData['family_code']);
            return;
        }

        if ($this->familyCodeCheckDigit($nineDFamCode) != $checkDigit) {
            session()->flash('message', 'Check digit invalid');
            return;
        }

        $validatedData['creator_id'] = Auth::user()->id;
        $validatedData['family_head'] = $validatedData['name'];
        $validatedData['check_digit'] = 0;

        DB::beginTransaction();

        try {
            $family = Family::create($validatedData);

            $validatedData['family_id'] = $family->family_id;

            Worker::create($validatedData);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        $this->resetInputFields();
        $this->emit('workerAdded');
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->family_code = '';
        $this->address = '';
        $this->email = '';
        $this->contact_number = '';
        $this->country = '';

        $this->citizenship_number = '';
        $this->pan_number = '';

        $this->diksha_date = '';
        $this->ritwik_name = '';
        $this->swastyayani_date = '';

        $this->worker_type = '';
        $this->panja_issue_date = '';
        $this->last_panja_renew_date = '';
        $this->next_panja_renew_date = '';

        $this->comment = '';
    }
}
