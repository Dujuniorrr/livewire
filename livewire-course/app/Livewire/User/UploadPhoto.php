<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UploadPhoto extends Component
{
    use WithFileUploads;

    public $photo;
    protected $rules = [
        'photo' => 'required|image|max:1024'
    ];

    public function render()
    {
        return view('livewire.user.upload-photo');
    }

    public function store(){
        $this->validate();

        $nameFile = Str::slug(auth()->user()->name) . '.' . $this->photo->getClientOriginalExtension();
        $path =  $this->photo->storeAs('public/users', $nameFile);
        if($path){
            auth()->user()->update(
                ['profile_photo_path' =>  h]
            );
        }

        return redirect()->route('tweets');
    }
}
