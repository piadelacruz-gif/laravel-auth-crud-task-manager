<x-app-layout><x-slot name="header"><div class="eyebrow">TASKS / CREATE</div><h1>Create a task</h1></x-slot>
<div class="card narrow"><form class="stack" action="{{ route('tasks.store') }}" method="POST">@csrf
@include('tasks._form')<div class="form-buttons"><button class="button primary">Save task</button><a class="button secondary" href="{{ route('tasks.index') }}">Cancel</a></div></form></div>
</x-app-layout>