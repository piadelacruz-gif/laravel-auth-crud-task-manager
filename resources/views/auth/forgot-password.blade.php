<x-guest-layout><div class="eyebrow">ACCOUNT RECOVERY</div><h1>Forgot your password?</h1>
<p class="muted">Enter your email address to receive a reset link. For local development, the link is written to storage/logs/laravel.log.</p>
<form method="POST" action="{{ route('password.email') }}" class="stack">@csrf
<label>Email address <input type="email" name="email" value="{{ old('email') }}" required></label>
<button class="button primary wide">Send reset link</button></form>
<p class="form-bottom"><a href="{{ route('login') }}">Back to login</a></p></x-guest-layout>
