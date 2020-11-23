@extends('layouts.app')

@section('content')
    <h1>Poll #{{ $poll->id }}</h1>

    <h2>{{ $poll->question_text }}</h2>

    <ul>
        @foreach($poll->choices as $choice)
        <li>{{ $choice->text }}: <b>{{ $choice->votes }} {{ Str::plural('vote', $choice->votes) }}</b></li>
        @endforeach
    </ul>

    <p>
        <a href="{{ route('polls.show', $poll) }}">&laquo; Go back to poll</a>
    </p>
@endsection
