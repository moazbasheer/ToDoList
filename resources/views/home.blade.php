@extends('layouts.main')

@section('content')
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Welcome to Home Page</span>
    </nav>
    @if(auth()->user())
        <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
        <div>
            <span class="navbar-brand mb-0 h1">My Items</span>
        </div>
        
        @php($items = auth()->user()->items)
        @foreach($items as $item)
            <form method="post">
                @csrf
                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                    {{ $item->done ? 'checked': '' }} 
                    onClick="this.form.submit()">
                    <label class="form-check-label" for="flexCheckDefault">
                    {{ e($item->name); }}
                    </label>
                    <a class="btn btn-danger" href="{{ route('delete', $item->id) }}"> Delete </a>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{$item->id}}"/>
            </form>
        @endforeach

        <a class="btn btn-primary" href="{{ route('add') }}">Add</a>
    @else
        <a class="btn btn-primary" href="{{ route('login') }}">LogIn</a>
        <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
    @endif
@endsection
