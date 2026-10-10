<x-app-layout><x-slot name="header"><div class="eyebrow">TASKS / EDIT</div><h1>Edit task</h1></x-slot>
<div class="card narrow"><form class="stack" action="{{ route('tasks.update',$task) }}" method="POST">@csrf @method('PUT')
@include('tasks._form')
<label class="inline-check"><input type="checkbox" name="is_completed" value="1" {{ old('is_completed',$task->is_completed) ? 'checked' : '' }}> Mark task as completed</label>
<div class="form-buttons"><button class="button primary">Save changes</button><a class="button secondary" href="{{ route('tasks.index') }}">Cancel</a></div></form></div></x-app-layout>