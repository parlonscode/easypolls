<div wire:poll.3s>
    <div style="width: 500px; height: 500px;">
        <livewire:livewire-pie-chart
            key="{{ $pieChartModel->reactiveKey() }}"
            :pie-chart-model="$pieChartModel"
        />
    </div>

    <ul>
        @foreach($poll->choices as $choice)
        <li>{{ $choice->text }}: <b>{{ $choice->votes }} {{ Str::plural('vote', $choice->votes) }}</b></li>
        @endforeach
    </ul>
</div>
