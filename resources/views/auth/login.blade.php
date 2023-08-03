@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">
        Login
    </div>
    <div class="card-body">

        <form action="{{ route('auth.login') }}" method="post">
            @csrf
            <label for="name">email</label>
            <input type="email" name="email" class="form-control"><br>
            <label for="name">password</label>
            <input type="password" name="password" class="form-control"><br>
            <input type="checkbox" name="remember"><p>Remember me</p>

            <div class="offset-sm-3">
                @include('partials.validation-errors')
            </div>
            <br>

            <input type="submit" value="Login" class="btn btn-secondary">
        </form>

    </div>
</div>



@endsection