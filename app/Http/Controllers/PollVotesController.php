<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Choice;
use Illuminate\Validation\Rule;

class PollVotesController extends Controller
{
    public function __invoke(Poll $poll)
    {
        request()->validate([
            'choice' => ['required', Rule::in($poll->choices()->pluck('id')->toArray())]
        ]);

        $poll
            ->choices()
            ->lockForUpdate()
            ->findOrFail(request('choice'))
            ->increment('votes');

        return redirect()->route('polls.results', $poll)
            ->with('notification.success', 'Merci d\'avoir répondu à ce sondage!');
    }
}
