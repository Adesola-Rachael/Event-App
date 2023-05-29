<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','user_id','phone'];

    public function event(){
        return $this->hasMany(Event::class);
    }
}
