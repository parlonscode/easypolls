@extends('layouts.app')

@section('content')
    <h1>Poll #{{ $poll->id }}</h1>

    <h2>{{ $poll->question_text }}</h2>

    <form method="POST" action="{{ route('polls.vote', $poll) }}">
        @csrf

        @foreach($poll->choices as $index => $choice)
        <label for="choice_{{ $index }}">
            <input type="radio" id="choice_{{ $index }}" name="choice" value="{{ $choice->id }}"> {{ $choice->text }}
        </label><br>
        @endforeach

        @error('choice')
            <p style="color: red; font-style: italic;">{{ $message }}</p>
        @enderror

        <br>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>

    <p>
        <a href="{{ route('polls.results', $poll) }}">📈 See poll's results</a>
    </p>
@endsection
