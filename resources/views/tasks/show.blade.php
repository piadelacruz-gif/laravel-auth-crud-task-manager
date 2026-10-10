<x-app-layout><x-slot name="header"><div class="eyebrow">TASK DETAILS</div><h1>{{ $task->title }}</h1></x-slot>
<article class="card narrow"><span class="status {{ $task->is_completed ? 'completed' : 'pending' }}">{{ $task->is_completed ? 'Completed' : 'Pending' }}</span>
<p class="task-detail">{{ $task->description ?: 'No description provided.' }}</p>
<p class="muted small">Created {{ $task->created_at->format('M j, Y g:i A') }}</p>
<div class="form-buttons"><a class="button primary" href="{{ route('tasks.edit',$task) }}">Edit task</a>
<a class="button secondary" href="{{ route('tasks.index') }}">Back to tasks</a></div></article></x-app-layout>