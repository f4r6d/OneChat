@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">
        Register
    </div>
    <div class="card-body">

        <form action="{{ route('register') }}" method="post">
            @csrf
            <label for="name">name</label>
            <input type="text" name="name" class="form-control"><br>
            <label for="email">email</label>
            <input type="email" name="email" class="form-control"><br>
            <label for="password">password</label>
            <input type="password" name="password" class="form-control"><br>
            <label for="password_confirmation">confirm password</label>
            <input type="password" name="password_confirmation" class="form-control"><br>

            <div class="offset-sm-3">
                @include('partials.validation-errors')
            </div>
            <br>

            <input type="submit" value="Register" class="btn btn-secondary">
        </form>

    </div>
</div>

@endsection