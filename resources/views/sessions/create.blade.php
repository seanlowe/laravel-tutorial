@extends('layouts.blog.master')

@section ('content')
    <div class="col-md-8">
        <h1>Sign In</h1>

        <form method="POST" action="/login">
            {{  csrf_field() }}

            {{-- <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div> --}}

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            {{-- <div class="form-group">
                <label for="password_confirmation">Password Confirmation:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div> --}}

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Sign In</button>
            </div>

            @include ('layouts.blog.errors')
        </form>
    </div>
@endsection