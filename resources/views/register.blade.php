@extends('layouts.main')

@section('content')
    <form method="POST" action="{{ route('postregister') }}">
        @csrf
        <div class="form-group">
            <label for="username">Name</label>
            <input type="text" class="form-control" name="username" style="width: 15%" id="email" aria-describedby="emailHelp" placeholder="Enter name">
            <div style="color: red;">
                @error('username')
                    {{ $message }}
                @enderror
            </div>
        </div>
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
            <input type="password" class="form-control" style="width: 15%" name="password" id="password" placeholder="Enter Password">
            <div style="color: red;">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div>
            <input type="submit" value="Register" class="btn btn-primary">
        </div>
    </form>
@endsection