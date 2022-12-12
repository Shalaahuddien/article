<x-user-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-user-navbar page-active="{{ $title }}" />
    <x-edit-mockup action="{{ route('update.article', ['id' => $data->id]) }}" method="POST" value-title="{{ $data->title }}"
        value-contain="{{ $data->contain }}" value-tag="{{ $data->tag }}" value-button="Edit Article" />
</x-user-layout>
