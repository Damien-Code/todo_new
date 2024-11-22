@extends('layouts.default')
@section('content')

    <div>
        <p>Hello, {{Auth::user()->name}}</p>
    </div>
    <div>
        <form method="post" action="{{route('category.store')}}">
            @csrf
            <input type="text" id="category" name="category" placeholder="Category">
            <button type="submit">Add</button>
        </form>
    </div>

    <div>
        @foreach($categories as $category)
            <div>
                <p>{{$category->category}}</p>
                <a href="{{route('category.show', $category->id)}}"><button>+</button></a>
                <form method="post" action="{{route('category.destroy', $category->id)}}">
                    @csrf
                    @method('DELETE')
                    <button>-</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
