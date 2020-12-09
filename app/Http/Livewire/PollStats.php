<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use Livewire\Component;
use Asantibanez\LivewireCharts\Models\PieChartModel;

class PollStats extends Component
{
    public Poll $poll;

    public function mount(Poll $poll)
    {
        $this->poll = $poll;
    }

    public function render()
    {
        $pieChartModel = new PieChartModel;
        $pieChartModel->setTitle(sprintf('Poll %d Results', $this->poll->id));

        foreach ($this->poll->choices as $index => $choice) {
           $pieChartModel->addSlice(
                $choice->text,
                $choice->votes,
                config('project.colors')[$index]
            );
        }

        return view('livewire.poll-stats', compact('pieChartModel'));
    }
}
