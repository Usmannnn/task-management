<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'task_id',
        'content',
        'status'
    ];

    public function tasks(){

        return $this->belongsTo(Task::class,'task_id');
    }
}
