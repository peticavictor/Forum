@extends('layouts.app')

@section('content')
<div class="container border rounded border-light opacity-75 ">
    <h2 class="text-light mt-2">New Question</h2>
    <form action="/question" method="POST" class="contaier d-flex flex-column">
        @csrf
        <input type="text" name="user_id" required hidden value="{{$user -> id}}">
        <input type="text" placeholder="Title" class="form-control mt-2" name="title" required max="190">
        @error('title')
            {{$message}}
        @enderror
        <input type="text" placeholder="Description" class="form-control mt-2" name="description" required max="190">
        @error('description')
            {{$message}}
        @enderror
        <button class="btn btn-outline-light my-2" type="submit">Add</button>
    </form>
</div>
    
@endsection