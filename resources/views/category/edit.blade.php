@extends('layouts.default')
@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="w-96 h-48 flex justify-between flex-row">
            <form method="post" action="{{route('category.update', $category->id)}}">
                @csrf
                @method('PATCH')
                <label for="category">Your Category</label>
                <input value="{{$category->category}}">
                <label for="color"></label>
                <input type="color" value="{{$category->color}}">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    Update
                </button>
            </form>
        </div>
    </div>
@endsection
