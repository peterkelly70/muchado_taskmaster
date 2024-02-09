<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'task';    
    protected $fillable = ['title', 'description'];

    public function statuses()
    {
        //return $this->belongsToMany(Status::class, 'taskonlist');
        // no taskonlist table presently
    }
}