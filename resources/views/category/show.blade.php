@extends('layouts.default')
@section('content')

    <div class="w-screen h-32 flex justify-between p-12">
        <p class="text-6xl">{{$category->category}}</p>
        <div class="w-52 flex justify-between">
            <a href="{{route('todo.create', ['category' => $category->id])}}">
                <button
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Add
                </button>
            </a>
        </div>
    </div>
    <div class="flex justify-center items-center flex-col p-24">
        @foreach($todos as $todo)
            <p>{{$todo->task}}</p>
            <form method="post" action="{{route('todo.updateTodo', $todo->id)}}">
                @method('PUT')
                @csrf
                <input type="checkbox" name="completed"
                       onclick="event.preventDefault(); this.closest('form').submit();"
                       @if($todo->completed) checked @endif value="{{old('completed', $todo->completed)}}">
            </form>
        @endforeach

        <a href="{{route('category.index')}}" class="pt-10">
            <button
                class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                Back
            </button>
        </a>
    </div>

@endsection
