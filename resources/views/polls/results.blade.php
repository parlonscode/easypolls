@extends('layouts.app')

@section('content')
    <h1>Poll #{{ $poll->id }}</h1>

    <h2>{{ $poll->question_text }}</h2>

    <livewire:poll-stats :poll="$poll" />

    <p>
        <a href="{{ route('polls.show', $poll) }}">&laquo; Go back to poll</a>
    </p>
@endsection
