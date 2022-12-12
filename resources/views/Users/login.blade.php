<x-user-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    @if (session('status'))
        <x-toast message="{{ session('status') }}" class="alert-success" id="message" />
    @endif
    <x-login-form action="{{ route('login.action') }}" method="POST">
        @if (session('error'))
            <x-alert message="{{ session('error') }}" class="alert-error"  />
        @endif
    </x-login-form>
</x-user-layout>
