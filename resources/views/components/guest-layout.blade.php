<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>{{ config('app.name') }} — Sign in</title>
@if(file_exists(public_path('build/manifest.json'))) @vite(['resources/css/app.css','resources/js/app.js'])
@else <link rel="stylesheet" href="{{ asset('css/app.css') }}"> @endif
</head><body><main class="guest-shell"><div class="auth-brand">✦ StudyFlow <span>Tasks</span></div>
<div class="auth-card">@if(session('status'))<div class="alert success">{{ session('status') }}</div>@endif
@if($errors->any())<div class="alert error">{{ $errors->first() }}</div>@endif
{{ $slot }}</div></main></body></html>
