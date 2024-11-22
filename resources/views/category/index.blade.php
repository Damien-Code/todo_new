@extends('layouts.default')
@section('content')
    <div class="flex justify-between px-20 py-6">
        <p class="text-2xl">Hello, {{Auth::user()->name}}</p>
        <form method="post" action="{{route('category.store')}}">
            @csrf
            <input type="color" id="color" name="color">
            <input type="text" id="category" name="category" placeholder="Category">
            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add</button>
        </form>
    </div>

    <div class="h-full w-screen grid grid-cols-3 justify-items-center gap-10">
        @foreach($categories as $category)
            <div class=" flex w-96 h-48 p-12 bg-[{{ $category->color }}] rounded-lg text-center flex-col justify-between">
                <p class="text-4xl">{{$category->category}}</p>
                <div class="flex justify-between p-12">
                    <a href="{{route('category.show', $category->id)}}">
                        <button
                            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            View
                        </button>
                    </a>
                    <form method="post" action="{{route('category.destroy', $category->id)}}">
                        @csrf
                        @method('DELETE')
                        <button
                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
