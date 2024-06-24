<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class ChatBoxExtend extends Component
{

    public $selectedRoomUser;


    public function render()
    {

        $path =  storage_path('/app/public/extend_sample_chat.json') ;
        $json = json_decode(file_get_contents($path), true);
        $data_room = $json['results']['room'] ;
        $comments = $json['results']['comments'];
        // dd($comments);

        return view('livewire.chat.chat-box-extend',['data_room'=>$data_room, 'comments'=>$comments]);
    }
}
