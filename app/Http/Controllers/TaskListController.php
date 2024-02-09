<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskListController extends Controller
{
 
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
    ]);

    $taskList = new TaskList;
    $taskList->title = $request->title;
    $taskList->description = $request->description;
    $taskList->save();

    return redirect()->route('tasklist.index');
}
