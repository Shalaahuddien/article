<x-guest-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    @if (session('token'))
        <x-user-navbar page-active="{{ $title }}" />
    @else
        <x-navbar page-active="{{ $title }}" />
    @endif
    <x-article tag="{{ $data->tag }}" date="{{ $data->created_at }}" title="{{ $data->title }}"
        contain="{{ $data->contain }}" />
</x-guest-layout>
