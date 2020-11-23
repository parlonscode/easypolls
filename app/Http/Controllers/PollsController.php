<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class PollsController extends Controller
{
    public function index()
    {
        $polls = Poll::all();

        return view('polls.index', compact('polls'));
    }

    public function create()
    {
        return view('polls.create');
    }

    public function show(Poll $poll)
    {
        return view('polls.show', compact('poll'));
    }

    public function store()
    {
        session()->put('next-choice-id', request('next-choice-id'));

        $validatedData = request()->validate([
            'question_text' => 'required|string|min:4',
            'choices' => 'required|array|min:2',
            'choices.*' => 'required|string',
        ]);

        $poll = Poll::create([
            'question_text' => $validatedData['question_text']
        ]);

        foreach ($validatedData['choices'] as $choice) {
            $poll->choices()->create(['text' => $choice]);
        }

        session()->forget('next-choice-id');

        return redirect()->route('polls.show', $poll)
            ->with('notification.success', 'Sondage créé avec succès!');
    }
}
