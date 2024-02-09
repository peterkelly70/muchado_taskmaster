<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasList extends Model
{
    use HasFactory;

    protected $table = 'user_has_list';

    protected $fillable = ['user_id', 'task_list_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function taskList()
    {
        return $this->belongsTo(TaskList::class);
    }
}