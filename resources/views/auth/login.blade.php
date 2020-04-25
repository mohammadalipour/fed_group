@extends('layouts.auth.login')

@section('content')
    <div class="body"></div>
    <div class="grad"></div>
    <div class="header">
        <div>Snapp<span>market</span></div>
        <p class="description">Sample and Beautiful</p>
    </div>
    <br>
    <div class="login">
        <div class="login-message"></div>
        <form method="POST" action="{{ url('/login')}}" id="login-form">
            <input type="hidden" name="_token" value="@php echo csrf_token(); @endphp">
            <input type="text" placeholder="username" name="email"><br>
            <input type="password" placeholder="password" name="password"><br>
            <input type="submit" value="Login">
        </form>

    </div>
@endsection