<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <h2 style="color: #1f2937; font-size: 24px; font-weight: bold; text-align: center; margin-bottom: 20px;">{{ __('Screen Locked') }}</h2>

        <!-- Lock screen form -->
        <form method="POST" action="{{ route('unlock-screen') }}">
            @csrf

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                @error('password')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Unlock') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>

    <!-- Inline JavaScript to prevent back navigation -->
    <script>
        // Prevent going back in history
        window.history.pushState(null, null, window.location.href);
        window.onpopstate = function () {
            window.history.forward();
        };
    </script>
</x-guest-layout>
