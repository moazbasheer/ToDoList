@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        Welcome to Home Page
    </div>
    <div class="card-body">
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
                        <input type="checkbox" value="" id="flexCheckDefault"
                        {{ $item->done ? 'checked': '' }} 
                        onClick="this.form.submit()" />
                        <label for="flexCheckDefault">
                        {{ e($item->name); }}
                        </label>
                        <a class="btn btn-danger" href="{{ route('delete', $item->id) }}"> Delete </a>
                    </div>
                    <input type="hidden" name="id" value="{{$item->id}}"/>
                </form>
            @endforeach
            <a class="btn btn-primary" href="{{ route('add') }}">Add</a>
        @else
            <a class="btn btn-primary" href="{{ route('login') }}">LogIn</a>
            <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
        @endif
    </div>
</div>
@endsection
