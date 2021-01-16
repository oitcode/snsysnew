<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Family;
use App\Worker;

class WorkerCreate extends Component
{
    public $name;
    public $familyCode;
    public $ritwikName;
    public $address;
    public $contactNumber;
    public $email;
    public $workerType;
    public $country = 'Nepal';
    public $comment;

    public function render()
    {
        return view('livewire.worker-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'familyCode' => 'required|unique:family,family_code',
            'ritwikName' => 'required',
            'email' => 'nullable|email',
            'contactNumber' => 'required|regex:/^[0-9]*$/',
            'address' => 'required',
            'workerType' => 'required',
            'country' => 'required',
            'comment' => 'nullable',
        ]);

        $validatedData['family_code'] = $validatedData['familyCode'];
        // TODO
        $validatedData['check_digit'] = 0;
        $validatedData['ritwik_name'] = $validatedData['ritwikName'];
        $validatedData['contact_number'] = $validatedData['contactNumber'];
        $validatedData['worker_type'] = $validatedData['workerType'];
        $validatedData['creator_id'] = Auth::user()->id;

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
        $this->familyCode = '';
        $this->ritwikName = '';
        $this->address = '';
        $this->email = '';
        $this->contactNumber = '';
        $this->workerType = '';
        $this->comment = '';
    }
}
