@extends('layouts.default')
@section('content')
    <div class="flex justify-between px-20 py-6">
        <p class="text-2xl">Hello, {{Auth::user()->name}}</p>
        <form method="post" action="{{route('category.store')}}">
            @csrf
            <input type="color" id="color" name="color" value="#ffffff">
            <input type="text" id="category" name="category" placeholder="Category">
            <button type="submit"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Add
            </button>
        </form>
    </div>

    <div class="h-full w-screen grid grid-cols-3 justify-items-center gap-10">
        @foreach($categories as $category)
            <div class=" flex w-96 h-48 p-12 rounded-lg text-center flex-col justify-between"
                 style="background-color: {{$category->color}};">
                <div class="h-10">
                    <p class="text-4xl">{{$category->category}}</p>
                </div>
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
                    <a href="{{route('category.edit', $category->id)}}">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                 fill="#e8eaed">
                                <path
                                    d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/>
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
