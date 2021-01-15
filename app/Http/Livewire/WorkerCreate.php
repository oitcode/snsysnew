<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Worker;

class WorkerCreate extends Component
{
    public $name;
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
            'ritwikName' => 'required',
            'email' => 'nullable|email',
            'contactNumber' => 'required|regex:/^[0-9]*$/',
            'address' => 'required',
            'workerType' => 'required',
            'country' => 'required',
            'comment' => 'nullable',
        ]);

        $validatedData['ritwik_name'] = $validatedData['ritwikName'];
        $validatedData['contact_number'] = $validatedData['contactNumber'];
        $validatedData['worker_type'] = $validatedData['workerType'];
        $validatedData['creator_id'] = Auth::user()->id;

        Worker::create($validatedData);

        $this->resetInputFields();
        $this->emit('workerAdded');
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->ritwikName = '';
        $this->address = '';
        $this->email = '';
        $this->contactNumber = '';
        $this->workerType = '';
        $this->comment = '';
    }
}
