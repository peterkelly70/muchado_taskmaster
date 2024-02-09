@extends('layouts.app')

@section('content')
<div class="container" x-data="{ tab: 'list' }">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div style="display: flex; width: 8em; margin-bottom: 2em;">
        <button type="submit" form="logout-form" style="padding: 5px 10px;">Logout</button>
    </div>
    
    <h1>Dashboard</h1>
   
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Tab buttons -->
    <div class="tabs">
        <button :class="{ 'active': tab === 'list' }" @click="tab = 'list'"><h2>New List</h2></button>
        <button :class="{ 'active': tab === 'task' }" @click="tab = 'task'"><h2>New Task</h2></button>
        <button :class="{ 'active': tab === 'assign' }" @click="tab = 'assign'"><h2>Assign Task</h2></button>
        <button :class="{ 'active': tab === 'order' }" @click="tab = 'order'"><h2>Order Tasks</h2></button>
        <button :class="{ 'active': tab === 'progress' }" @click="tab = 'progress'"><h2>Task Progress</h2></button>
    </div>

    <!-- Tab content -->
    <div class="tab-content">
        <div x-show="tab === 'list'">
            <h2>Create a new list</h2>
            <!-- Your form goes here -->
        </div>

        <div x-show="tab === 'task'">
            <h2>Create a new task</h2>
            <!-- Your form goes here -->
        </div>

        <div x-show="tab === 'assign'">
            <h2>Assign a task to a list</h2>
            <!-- Your form goes here -->
        </div>

        <div x-show="tab === 'order'">
            <h2>Set the order of tasks</h2>
            <!-- Your form goes here -->
        </div>

        <div x-show="tab === 'progress'">
            <h2>Set the progress of tasks</h2>
            <!-- Your form goes here -->
        </div>
    </div>
</div>
@endsection