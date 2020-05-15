<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
	// public $data;

	// public function mount($data)
	// {
	// 	$this->data = $data;
	// }

	public $name,$phone;

    public function render()
    {
        return view('livewire.contact-create');
    }

    public function store()
    {
    	$this->validate([
    		'name' => 'required|min:3',
    		'phone' => 'required|max:15'
    	]);

    	$contact = Contact::create([
    		'name' => $this->name,
    		'phone' => $this->phone
    	]);

    	$this->resetInput();

    	$this->emit('contactStore', $contact);
    }

    private function resetInput()
    {
    	$this->name = null;
    	$this->phone = null;
    }
}
