<div>
    <h2>Welcome back!</h2>

    <form wire:submit.prevent="handleFormSubmit" novalidate>
        <div>
            <label for="email">Email:</label><br>
            <input type="email" name="email" wire:model.defer="email" id="email" required>
            @error('email')
                <p style="color: red; font-style: italic; font-weight: bold;">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label for="password">Password:</label><br>
            <input type="password" name="password" wire:model.defer="password" id="password" required>
            @error('password')
                <p style="color: red; font-style: italic; font-weight: bold;">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <button type="submit">Log In</button>
        </div>
    </form>
</div>
