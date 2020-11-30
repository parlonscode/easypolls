@extends('layouts.app')

@section('content')
    <h1>All Polls</h1>

    <ul>
    @forelse($polls as $poll)
        <li>
            <a href="{{ route('polls.show', $poll) }}">
                {{ $poll->question_text }}
            </a>
        </li>
    @empty
        <li>Sorry, no polls yet. <a href="{{ route('home') }}">Be the first!</a></li>
    @endforelse
    </ul>
@endsection
