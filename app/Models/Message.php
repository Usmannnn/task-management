<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'sender_id',
        'receiver_id',
        'm_head',
        'message',
        'isRead'
    ];

    public function users(){

        return $this->belongsTo(User::class, 'sender_id');
    }
}
