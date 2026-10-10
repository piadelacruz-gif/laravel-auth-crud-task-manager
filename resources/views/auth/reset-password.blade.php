<x-guest-layout><div class="eyebrow">ACCOUNT RECOVERY</div><h1>Reset your password</h1>
<form method="POST" action="{{ route('password.store') }}" class="stack">@csrf
<input type="hidden" name="token" value="{{ $token }}">
<label>Email address <input type="email" name="email" value="{{ old('email',$email) }}" required></label>
<label>New password <input type="password" name="password" minlength="8" required></label>
<label>Confirm new password <input type="password" name="password_confirmation" minlength="8" required></label>
<button class="button primary wide">Reset password</button></form></x-guest-layout>
