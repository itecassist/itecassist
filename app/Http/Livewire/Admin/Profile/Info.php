<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\Customer;

class Info extends Component
{

    public $reference;
    public $company_name;
    public $address;
    public $contact_person;
    public $contact_number;
    public $email;
    public $password;
    public $is_active;

    protected $rules = [
        'reference' => 'required',
        'company_name' => 'required|min:6',
        'address' => 'required|min:6',
        'contact_person' => 'required|min:6',
        'contact_number' => 'required|min:6',
        'email' => 'required|email',
    ];


    public function mount()
    {
        $this->loadModel();
    }

    public function loadModel()
    {
        $res = Customer::findOrFail(session()->get('id'));
        $this->reference=$res->reference;
        $this->company_name=$res->company_name;
        $this->address=$res->address;
        $this->contact_person=$res->contact_person;
        $this->contact_number=$res->contact_number;
        $this->email=$res->email;
        $this->password=$res->password;
        $this->is_active=$res->is_active;
    }

    public function saveForm()
    {
        $data = $this->validate();
        $res = Customer::findOrFail(session()->get('id'));
        $res->update($data);
        $res->save();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Updated']);
    }

    public function render()
    {
        return view('livewire.admin.profile.info');
    }
}
