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
            <div class="flex justify-between items-center w-96 h-16 p-4 mb-6 border-solid border-2 border-gray-400">
                <form method="post" action="{{route('todo.updateTodo', $todo->id)}}">
                    @method('PUT')
                    @csrf
                    <input type="checkbox" name="completed"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           @if($todo->completed) checked @endif value="{{old('completed', $todo->completed)}}">
                </form>
                <div class="flex justify-evenly w-36">
                    <p class="text-xl text-left">{{$todo->task}}</p>
                    <form method="post" action="{{route('todo.destroy', $todo->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                     width="24px"
                                     fill="black">
                                    <path
                                        d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                                </svg>
                            </button>
                    </form>
                </div>
            </div>
        @endforeach

        <a href="{{route('category.index')}}" class="pt-10">
            <button
                class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                Back
            </button>
        </a>
    </div>

@endsection
