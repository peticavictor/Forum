@extends('layouts.app')

@section('content')
<div class="container d-flex flex-row justify-content-between">
    <div class="container col-md-3 ">
        <div class="card bg-dark border-light text-light opacity-75">
            <div class="card-header border-light d-flex justify-content-between">
                <div>Questions</div>
                <a href="/createQuestion" class="text-light opacity-100">New</a>
            </div>
            <div class="card-body d-flex flex-column overflow-scroll  " style="height: 80vh; ">
                @foreach ($questions as $question)
                    <a href="/{{$question -> id}}" class="text-light btn  table table-hover mb-0 pb-0" style=":hover{color:black;}">
                        <h6>{{$question -> id}}</h6>
                        <h6>{{$question -> created_at}}</h6>
                        <h6>{{$question -> title}}</h6>
                        <h6>by {{$question -> name}}</h6>
                    </a>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-11">
            <div class="card bg-dark border-light text-light opacity-75">
                <div class="card-header border-light d-flex justify-content-between">
                    <div>Answers</div>
                    <a href="/createAnswer" class="text-light opacity-100">New</a>
                </div>
                <div class="card-body d-flex flex-column overflow-scroll  " style="height: 80vh; ">
                    @if (!is_null($uniqueQuestion))
                        @foreach ($uniqueQuestion as $q)
                            <div class="container border border-light rounded pt-2">
                                <h6>Question: {{$q -> id}}</h6>
                                <h6>Title: {{$q -> title}}</h6>
                                <h6>Description: {{$q -> description}}</h6>
                                <form action="/answer" method="POST" class="contaier d-flex flex-row">
                                    @csrf
                                    <input type="text" name="user_id" required hidden value="{{$q -> user_id}}">
                                    <input type="text" name="question_id" required hidden value="{{$q -> id}}">
                                    <input type="text" name="best_answer" required hidden value="{{0}}">
                                    <input type="text" placeholder="Answer" class="form-control my-2 me-2" name="answer" required max="190">
                                    @error('answer')
                                        {{$message}}
                                    @enderror
                                    <button class="btn btn-outline-light my-2" type="submit">Add</button>
                                </form>
                            </div>
                        @endforeach
                        <hr>
                        @if (!$answers->isEmpty())
                            @foreach ($answers as $answer)
                                <div class="text-light">
                                    <h6>{{$answer -> created_at}}</h6>
                                    <h6>{{$answer -> answer}}</h6>
                                    <h6>by {{$answer -> name}}</h6>
                                </div>
                                <hr>
                            @endforeach
                        @else
                            <h5 class="text-center">No answers</h5>
                        @endif
                    @else
                        <h3 class="text-center">Choose a question</h3>
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection