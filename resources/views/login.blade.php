@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        Log In
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('postlogin') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" style="width: 15%" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <div style="color: red;">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" style="width: 15%" name="password" id="password" placeholder="Password">
                <div style="color: red;">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Sign In</button>
            </div>
        </form>
    </div>
</div>
@endsection