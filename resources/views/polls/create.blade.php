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
                <div>
                    <input type="text" name="choices[]" placeholder="Enter choice" required><br>
                </div><button type="button" onclick="handleRemove(this)">&times; Remove</button>
            </template>

            <div id="js-choices">
                @foreach(old('choices', range(0, 2)) as $i => $choice)
                    <div>
                        <input type="text" name="choices[]" placeholder="Enter choice" value="{{ old('choices.' . $i) }}" required><br>
                    </div><button type="button" onclick="handleRemove(this)">&times; Remove</button>
                    @error('choices.' . $i)
                        <p style="color: red; font-style: italic;">{{ $message }}</p>
                    @enderror
                @endforeach
            </div>

            @error('choices')
                <p style="color: red; font-style: italic;">{{ $message }}</p>
            @enderror

            <button type="button" onclick="addChoice()">&plus; Add choice</button>
        </div>

        <br>

        <div>
            <button type="submit" formnovalidate>Create Poll</button>
        </div>
    </form>
@endsection

<script>
    function handleRemove(button) {
        button.previousSibling.remove();
        button.remove();
    }

    function addChoice() {
        const newChoiceTemplate = document.querySelector('#js-new-choice-template');
        const choicesDiv = document.querySelector('#js-choices');

        choicesDiv.appendChild(newChoiceTemplate.content.cloneNode(true));
    }
</script>
