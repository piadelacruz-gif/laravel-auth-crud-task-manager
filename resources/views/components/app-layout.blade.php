<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>{{ config('app.name') }} — Tasks</title>
@if(file_exists(public_path('build/manifest.json'))) @vite(['resources/css/app.css','resources/js/app.js'])
@else <link rel="stylesheet" href="{{ asset('css/app.css') }}"> @endif
</head><body>
<nav class="nav"><div class="wrap nav-inner"><a class="brand" href="{{ route('tasks.index') }}">✦ StudyFlow <span>Tasks</span></a>
<div class="nav-right"><a class="nav-link" href="{{ route('tasks.index') }}">My Tasks</a><span class="profile-pill">{{ auth()->user()->name }}</span>
<form method="POST" action="{{ route('logout') }}">@csrf<button class="nav-signout" type="submit">Log out</button></form></div></div></nav>
<main class="wrap main">
@if(isset($header))<div class="page-header">{{ $header }}</div>@endif
@if(session('status'))<div class="alert success" role="status">{{ session('status') }}</div>@endif
@if($errors->any())<div class="alert error" role="alert">{{ $errors->first() }}</div>@endif
{{ $slot }}</main><footer class="footer">Student Task Manager · Laravel Authentication & CRUD</footer></body></html>
