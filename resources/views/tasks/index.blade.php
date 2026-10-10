<x-app-layout>
<x-slot name="header"><div class="headline"><div><div class="eyebrow">YOUR WORKSPACE</div><h1>My Tasks</h1><p class="muted">Stay organized, one task at a time.</p></div>
<a class="button secondary" href="{{ route('tasks.create') }}">+ New Task</a></div></x-slot>
<div class="stats"><article class="stat"><span>Total Tasks</span><strong>{{ $total }}</strong></article>
<article class="stat"><span>Completed</span><strong>{{ $completed }}</strong></article>
<article class="stat"><span>Pending</span><strong>{{ $total - $completed }}</strong></article></div>
<div class="columns"><section class="card"><h2>Add a task</h2><p class="muted small">What would you like to accomplish?</p>
<form class="stack" method="POST" action="{{ route('tasks.store') }}">@csrf
<label>Task title <input name="title" placeholder="e.g. Finish web programming lab" maxlength="255" value="{{ old('title') }}" required></label>
<label>Description <textarea name="description" rows="5" placeholder="Optional details">{{ old('description') }}</textarea></label>
<button class="button primary wide">+ Add Task</button></form></section>
<section class="card list-card"><div class="list-title"><div><h2>My task list</h2>
<p class="muted small">Only tasks owned by your account appear here.</p></div><span class="count-chip">{{ $total }} total</span></div>
<div class="filters"><a class="{{ $filter === 'all' ? 'active' : '' }}" href="{{ route('tasks.index') }}">All tasks</a>
<a class="{{ $filter === 'pending' ? 'active' : '' }}" href="{{ route('tasks.index',['filter'=>'pending']) }}">Pending</a>
<a class="{{ $filter === 'completed' ? 'active' : '' }}" href="{{ route('tasks.index',['filter'=>'completed']) }}">Completed</a></div>
@if($tasks->count() === 0)<div class="empty"><strong>No tasks found</strong><p>Try adding a new task using the form.</p></div>
@else <div class="tasks">@foreach($tasks as $task)
<article class="task"><div class="task-main"><span class="task-marker {{ $task->is_completed ? 'done' : '' }}">{{ $task->is_completed ? '✓' : '○' }}</span>
<div><a href="{{ route('tasks.show',$task) }}" class="task-title {{ $task->is_completed ? 'strike' : '' }}">{{ $task->title }}</a>
<p>{{ $task->description ?: 'No description provided' }}</p>
<span class="status {{ $task->is_completed ? 'completed' : 'pending' }}">{{ $task->is_completed ? 'Completed' : 'Pending' }}</span></div></div>
<div class="task-actions"><a class="text-btn" href="{{ route('tasks.edit',$task) }}">Edit</a>
<form method="POST" action="{{ route('tasks.destroy',$task) }}" onsubmit="return confirm('Delete this task?')">@csrf @method('DELETE')
<button class="text-btn danger" type="submit">Delete</button></form></div></article>@endforeach
</div><div class="paging">{{ $tasks->links() }}</div>@endif</section></div></x-app-layout>