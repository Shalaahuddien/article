<x-user-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-register-form action="{{ route('register.action') }}" method="POST" />
</x-user-layout>
