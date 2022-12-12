<x-guest-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    @if (session('token'))
        <x-user-navbar page-active="{{ $title }}" />
    @else
        <x-navbar page-active="{{ $title }}" />
    @endif
    <div class="flex justify-center items-stretch flex-wrap gap-4 mt-3">
        @foreach ($article as $item)
            <x-card class="card w-96 bg-base-300 shadow-xl" title="{{ $item->title }}" tag="{{ $item->tag }}"
                description="{{ $item->description }}">
                <div class="card-actions justify-between items-center">
                <a href="{{ route('tag.detail', ['tag' => $item->tag]) }}"
                    class="badge badge-inline capitalize">{{ $item->tag }}
                </a>
                <a href="{{ route('article.show', ['slug' => $item->slug]) }}"
                    class="btn btn-sm btn-outline btn-info">Selengkapnya
                </a>
            </x-card>
        @endforeach
    </div>
    <x-pagination current-page="{{ $meta['currentPage'] }}" next-page="{{ $meta['nextPage'] }}"
        prev-page="{{ $meta['prevPage'] }}" />
</x-guest-layout>
