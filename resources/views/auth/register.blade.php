<x-guest-layout><div class="eyebrow">GET STARTED</div><h1>Create your account</h1>
<p class="muted">Your tasks will be private to your account.</p>
<form action="{{ route('register') }}" method="POST" class="stack">@csrf
<label>Full name <input name="name" value="{{ old('name') }}" required></label>
<label>Email address <input type="email" name="email" value="{{ old('email') }}" required></label>
<label>Password <input type="password" name="password" minlength="8" required></label>
<label>Confirm password <input type="password" name="password_confirmation" minlength="8" required></label>
<button class="button primary wide">Create account</button></form>
<p class="form-bottom">Already registered? <a href="{{ route('login') }}">Sign in</a></p>
</x-guest-layout>
