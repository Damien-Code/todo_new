@extends('layouts.default')
@section('content')
    <form method="post" action="{{route('todo.store')}}">
        @csrf
        <input type="hidden" value="{{ $category }}" name="category_id">
        <label>Task</label>
        <input name="task">
        <button type="submit">+</button>
    </form>

@endsection
