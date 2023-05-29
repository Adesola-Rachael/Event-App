<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [ 'message','event_category_id'];

    public function category(){
        return $this->belongsTo(EventCategory::class);
    }
    public function event(){
        return $this->hasMany(Event::class);
    }
}
