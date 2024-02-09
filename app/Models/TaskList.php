<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    use HasFactory;
    
    protected $table = 'task_list';
    protected $fillable = ['name', 'description'];
    
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_has_list', 'task_list_id', 'user_id');
    }

}
