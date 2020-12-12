<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Choice;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class PollVotesController extends Controller
{
    public function __invoke(Poll $poll)
    {
        request()->validate([
            'choice' => ['required', Rule::in($poll->choices()->pluck('id')->toArray())]
        ]);

        try {
            DB::transaction(function() {
                Choice::lockForUpdate()
                    ->findOrFail(request('choice'))
                    ->increment('votes');
            });
        } catch (\Exception $e) {
            logger()->debug('** ERROR: An error occured **');
        }

        return redirect()->route('polls.results', $poll)
            ->with('notification.success', 'Merci d\'avoir répondu à ce sondage!');
    }
}
