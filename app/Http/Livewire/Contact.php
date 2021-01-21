<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Contact extends Component
{
    use WithPagination;

    public $name, $email, $number, $search, $contacts, $contact_id;
    public $isEdit = false;


    public function clear()
    {
        $this->name = '';
        $this->email = '';
        $this->number = '';
        $this->search = '';
        $this->contact_id = '';
        $this->isEdit = false;
    }

    public function submit()
    {
        $this->validation();
        \App\Contact::query()->create([
            'name' => $this->name,
            'number' => $this->number,
            'email' => $this->email
        ]);
        $this->clear();
        session()->flash('message', 'Contact Successfully Created');
    }

    public function update()
    {
        $this->validation();
        $updated = \App\Contact::query()->findOrFail($this->contact_id);

        $updated->update([
            'name' => $this->name,
            'number' => $this->number,
            'email' => $this->email
        ]);
        $this->clear();
        session()->flash('message', 'Contact Successfully Updated');
    }

    public function edit($id)
    {
        $oldContact = \App\Contact::query()->findOrFail($id);
        if ($oldContact) {
            $this->isEdit = true;
            $this->contact_id = $oldContact->id;
            $this->name = $oldContact->name;
            $this->email = $oldContact->email;
            $this->number = $oldContact->number;
        }
    }

    public function validation()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'number' => 'required'
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'number' => 'required'
        ]);
    }


    public function remove($id)
    {
        $cont = \App\Contact::query()->findOrFail($id);
        $cont->delete();
        session()->flash('message', 'Contact Successfully Removed');
    }

    public function render()
    {
        if ($this->search != null) {
            $contactss = \App\Contact::query()->where('name', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $contactss = \App\Contact::query()->latest()->paginate(10);
        }
        return view('livewire.contact',compact('contactss'));
    }
}
