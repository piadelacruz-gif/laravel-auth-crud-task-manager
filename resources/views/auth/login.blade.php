<x-guest-layout>
<div class="eyebrow">WELCOME BACK</div><h1>Sign in to your workspace</h1><p class="muted">Organize schoolwork one task at a time.</p>
<form action="{{ route('login') }}" method="POST" class="stack">@csrf
<label>Email address <input name="email" type="email" value="{{ old('email') }}" required autofocus></label>
<label>Password <input name="password" type="password" required></label>
<label class="inline-check"><input name="remember" type="checkbox" value="1"> Remember me</label>
<button class="button primary wide">Sign in</button></form>
<div class="auth-links"><a href="{{ route('password.request') }}">Forgot password?</a>
<span>New here? <a href="{{ route('register') }}">Create an account</a></span></div>
</x-guest-layout>
