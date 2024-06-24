<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Chat extends Component
{

    public $query; 
    public $selectedRoomUser;

   

    public function mount(){

        $path =  storage_path('/app/public/sample_chat.json') ;
        $json = json_decode(file_get_contents($path), true); 

        $this->selectedRoomUser = $json["results"]["room"];
        $this->query = $json["results"]["room"]['id'];
        
        //dd($this->selectedRoomUser);
        //dd($json["results"]);
    }

    public function render()
    {
        
        return view('livewire.chat.chat',);
    }
}
