@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('polls.store') }}">
        @csrf

        <div>
            <label for="question_text">Question Text</label><br>
            <textarea id="question_text" name="question_text" autofocus required>{{ old('question_text') }}</textarea>

            @error('question_text')
                <p style="color: red; font-style: italic;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <h3>Choices</h3>

            <template id="js-new-choice-template">
                <input type="text" name="choices[]" placeholder="Enter choice" required><br>
            </template>

            <div id="js-choices">
                <input id="js-next-choice-id" name="next-choice-id" type="hidden" value="{{ session('next-choice-id', 3) }}">
                @for($i = 0; $i < session('next-choice-id', 3); $i++)
                    <input type="text" name="choices[]" placeholder="Enter choice" value="{{ old('choices.' . $i) }}" required><br>
                    @error('choices.' . $i)
                        <p style="color: red; font-style: italic;">{{ $message }}</p>
                    @enderror
                @endfor
            </div>

            <button type="button" onclick="addChoice()">&plus; Add choice</button>
        </div>

        <br>

        <div>
            <button type="submit" formnovalidate>Create Poll</button>
        </div>
    </form>
@endsection

<script>
    function addChoice() {
        const newChoiceTemplate = document.querySelector('#js-new-choice-template');
        const nextIdInput = document.querySelector('#js-next-choice-id');
        let nextChoiceId = parseInt(nextIdInput.value);
        const choicesDiv = document.querySelector('#js-choices');

        choicesDiv.appendChild(newChoiceTemplate.content.cloneNode(true));

        nextIdInput.value = ++nextChoiceId;
    }
</script>
