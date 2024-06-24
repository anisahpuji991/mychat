<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class ChatList extends Component
{

    public $selectedRoomUser;


    public function render()
    {
        $path =  storage_path('/app/public/sample_chat.json') ;
        $json = json_decode(file_get_contents($path), true);
        $data_room = $json['results']['room'] ;

        
        $comments = $json['results']['comments'];
        $count_comments = key(array_slice($comments, -1, 1, true));
        $last_comment = $comments[$count_comments]['message'];

        return view('livewire.chat.chat-list',['data'=>$data_room , 'last_comment'=>$last_comment]);
    }
}
