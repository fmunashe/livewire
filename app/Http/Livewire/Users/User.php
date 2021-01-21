<?php

namespace App\Http\Livewire\Users;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    public $users, $name, $email, $password, $search, $user_id,$token;
    public $isEdit = false, $isCreate = false;

    public function render()
    {
        if ($this->search != null) {
            $userss = \App\User::query()->where('name', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $userss = \App\User::query()->latest()->paginate(10);
        }
        return view('livewire.users.user',compact('userss'));
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
        ]);
    }

    public function validation()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'password' => 'required|min:5',
        ]);
    }

    public function clear()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->search = '';
        $this->user_id = '';
        $this->isEdit = false;
        $this->isCreate = false;
    }

    public function setCreate()
    {
        $this->isCreate = true;
        $this->isEdit = false;
    }

    public function setEdit($id)
    {
        $this->isEdit = true;
        $this->isCreate = false;
        $user = \App\User::query()->findOrFail($id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
    }

    public function create()
    {
        $this->validation();
        \App\User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
        $this->clear();
        session()->flash('message', 'User Successfully Created');
    }

    public function update()
    {
        $this->validation();
        $updated = \App\User::query()->findOrFail($this->user_id);
        $updated->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
        $this->clear();
        session()->flash('message', 'User Successfully Updated');
    }

    public function remove($id)
    {
        if ($id == auth()->user()->id) {
            session()->flash('message', 'You cannot remove yourself from the system');
            return;
        }
        $delete = \App\User::query()->findOrFail($id);
        $delete->delete();
        session()->flash('message', 'User Successfully Removed From The System');
    }

    public function getToken(){
        $client=new Client();
        $username="AGRIBANK";
        $password="34578901234";
        $authorisation=" Basic YmF6OjEyMzQ1";
        $grant_type="password";
        $response = $client->request('POST', 'https://secure.zimswitch.co.zw/lab/bfis/v1/oauth/token', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => $authorisation
            ],
            'form_params' => [
                'username' => $username,
                'password' => $password,
                'grant_type' => $grant_type
            ]
        ])->getBody()->getContents();
        $res=json_decode($response);
        $this->token=$res->access_token;
      //  return $token;
    }
}
