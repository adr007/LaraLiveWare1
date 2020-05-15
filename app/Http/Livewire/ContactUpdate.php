<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{
	public $name,$phone;
	public $idx;

	protected $listeners = [
		'getContact' => 'showContact'
	];

    public function render()
    {
        return view('livewire.contact-update');
    }

    public function showContact($contact)
    {
    	$this->name = $contact['name'];
    	$this->phone = $contact['phone'];
    	$this->idx = $contact['id'];
    }

    public function update()
    {
    	$this->validate([
    		'name' => 'required|min:3',
    		'phone' => 'required|max:15'
    	]);

    	if ($this->idx) {
    		$contact = Contact::find($this->idx);
    		$contact->update([
    			'name' => $this->name,
    			'phone' => $this->phone,
    		]);

    		$this->resetInput();

    		$this->emit('contactUpdated');
    	}
    }

    private function resetInput()
    {
    	$this->name = null;
    	$this->phone = null;
    	$this->idx = null;
    }
}
