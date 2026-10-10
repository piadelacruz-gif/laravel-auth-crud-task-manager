<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ config('app.name') }} — Account</title>
@if(file_exists(public_path('build/manifest.json')))
  @vite(['resources/css/app.css','resources/js/app.js'])
@else
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endif
</head>
<body class="auth-split">
<aside class="auth-promo">
  <a class="auth-brand" href="{{ url('/') }}">✳ StudyFlow <span>Tasks</span></a>
  <div class="promo-heading">
    <div class="eyebrow" style="color:#b5e5ca">STAY ORGANIZED, EVERY DAY</div>
    <h1>A calmer way to manage your schoolwork.</h1>
    <p>Keep your assignments, activities, and reminders organized in one simple, refreshing workspace.</p>
    <div class="promotags"><span>✓ Easy task tracking</span><span>✓ Stay on schedule</span><span>✓ Focus on progress</span></div>
  </div>
  <div class="auth-promo-footer">StudyFlow · Web Programming Laravel Lab</div>
</aside>
<main class="auth-content"><div class="auth-panel">
  <div class="eyebrow">STUDENT WORKSPACE</div>
  @if(session('status'))<div class="alert success" role="status">{{ session('status') }}</div>@endif
  @if($errors->any())<div class="alert error" role="alert">{{ $errors->first() }}</div>@endif
  <div class="auth-card">{{ $slot }}</div>
  <p class="auth-footer">Laravel Authentication &amp; CRUD · Secure server-side authentication</p>
</div></main>
</body></html>
