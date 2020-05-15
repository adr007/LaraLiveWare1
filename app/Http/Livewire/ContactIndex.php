<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
	use WithPagination;

	protected $listeners = [
		'contactStore' => 'handleStored',
		'contactUpdated' => 'handleUpdate'
	];

	public $statusUpdate = false;

    public function render()
    {
    	$data = Contact::latest()->paginate(5);
        return view('livewire.contact-index', compact('data'));
    }

    public function getContact($id)
    {
    	$this->statusUpdate = true;
    	$contact = Contact::find($id);
    	$this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
    	Contact::find($id)->delete();
    	session()->flash('message', 'Contact Was Destroyed');
    }

    public function handleStored($contact)
    {
    	session()->flash('message', 'Contact <b>'.$contact['name'].'</b> was stored');
    }

    public function handleUpdate()
    {
    	session()->flash('message', 'Data Updated!');
    }
}
