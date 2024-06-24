<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable=[
        'room_code',
        'room_name',
        'image'
    ];

    public function room_user(){
        return $this->hasMany(RoomUser::class,'room_id');
    }
}
