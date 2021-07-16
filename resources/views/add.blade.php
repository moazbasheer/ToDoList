@extends('layouts.main')

@section('content')
    <form method="post">
        @csrf
        <div class="form-group">
            <input class="form-control" style="width:20%" placeholder="add item" type="text" name="name" />
        </div>
        <div style="color: red;">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Add"/>
        </div>
    </form>
@endsection