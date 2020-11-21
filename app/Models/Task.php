<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_name',
        'content',
        'status',
        'progress',
        'start_date',
        'end_date'
    ];

    public function users() {

        return $this->belongsToMany(User::class,'user_task');
    }

}
