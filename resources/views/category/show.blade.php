@extends('layouts.default')
@section('content')

<div class="w-screen h-28">
    <p class="text-6xl">{{$category->category}}</p>
</div>

<div>
    <a href="{{route('category.index')}}"><button>Back</button></a>
    <a href="{{route('todo.create', ['category' => $category->id])}}"><button>+</button></a>
</div>
<div>
    @foreach($todos as $todo)
        <p>{{$todo->task}}</p>
    @endforeach
</div>

@endsection
