<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_id',
        'room_id',
        'type'
    ];

    public function room_user(){
        return $this->belongsTo(RoomUser::class);
    }


}
