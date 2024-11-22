@extends('layouts.default')
@section('content')
    <form method="post" action="{{route('todo.store')}}">
        <label>Task</label>
        <input>
        <button>+</button>
    </form>

@endsection
