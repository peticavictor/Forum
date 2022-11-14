@extends('layouts.app')

@section('content')
<h1 class="text-light">index</h1>
{{-- <div class="container d-flex flex-row justify-content-between">
    <div class="container col-md-3 ">
        <div class="card bg-dark border-light text-light opacity-75">
            <div class="card-header border-light d-flex justify-content-between">
                <div>Questions</div>
                <a href="/createQuestion" class="text-light opacity-100">New</a>
            </div>
            <div class="card-body d-flex flex-column overflow-scroll  " style="height: 80vh; ">
                @foreach ($questions as $question)
                    <a href="/{{$question -> id}}" class="text-light btn  table table-hover" style=":hover{color:black;}">
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
                <div class="card-header border-light">Answers</div>
                <div class="card-body d-flex flex-column overflow-scroll  " style="height: 80vh; ">
                    <h6>Question:</h6>
                    <h6>{{$question -> title}}</h6>
                    <h6>{{$question -> description}}</h6>
                    <hr>
                    @foreach ($answers as $answer)
                        <div class="text-light">
                            <h6>{{$answer -> created_at}}</h6>
                            <h6>{{$answer -> answer}}</h6>
                            <h6>by {{$answer -> name}}</h6>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection