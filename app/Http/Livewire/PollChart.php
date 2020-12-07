<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use Livewire\Component;
use Asantibanez\LivewireCharts\Models\PieChartModel;

class PollChart extends Component
{
    public function render()
    {
        $poll = Poll::find(1);

        $colors = ['#f6ad55', '#fc8181', '#90cdf4', '#12cdc1', '#123456'];

        $pieChartModel = new PieChartModel;
        $pieChartModel->setTitle(sprintf('Poll %d Results', $poll->id));

        foreach ($poll->choices as $index => $choice) {
           $pieChartModel->addSlice($choice->text, $choice->votes, $colors[$index]);
        }

        return view('livewire.poll-chart', compact('pieChartModel'));
    }
}
