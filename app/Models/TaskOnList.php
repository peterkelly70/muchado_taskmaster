<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskOnList extends Model
{
    use HasFactory;

    protected $table = 'task_on_list';
    protected $fillable = ['task_id', 'task_list_id', 'status_id', 'title', 'description'];



    public function taskLists()
    {
        return $this->belongsToMany(TaskList::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}

