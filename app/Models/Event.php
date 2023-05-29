<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'message_id', 'event_date', 'receiver_id','user_id'];

    public function message(){
        return $this->belongsTo(Message::class);
    }
    public function receiver(){
        return $this->belongsTo(Receiver::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
