<h1>新規登録</h1>
@if ($errors->any())
<div class="login_error">
    <ul>
@foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
@endforeach
    </ul>
</div>
@endif
<form method="POST" class="form" action="{{ url()->current() }}">
    @csrf
    <input type="text" name="name" placeholder="name" value="{{ old('name') }}" required autofocus>
    <input type="text" name="userid" placeholder="user id" value="{{ old('userid') }}" required autofocus>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Password(confirmation)" required>
    <button type="submit" id="login-button">新規登録</button>
</form>
