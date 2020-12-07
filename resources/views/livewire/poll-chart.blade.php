<div wire:poll.3s style="width: 500px; height: 500px;">
    <livewire:livewire-pie-chart
        key="{{ $pieChartModel->reactiveKey() }}"
        :pie-chart-model="$pieChartModel"
    />
</div>
