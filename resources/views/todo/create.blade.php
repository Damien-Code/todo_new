@extends('layouts.default')
@section('content')
    <div class="h-screen w-screen flex justify-center items-center">
        <form method="post" action="{{route('todo.store')}}">
            @csrf
            <input type="hidden" value="{{ $category }}" name="category_id">
            <label>Task</label>
            <input name="task">
            <button type="submit"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Save
            </button>
        </form>
    </div>
@endsection
