<x-user-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-user-navbar page-active="{{ $title }}">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $user->token }}" />
            <button type="submit">Logout</button>
        </form>
    </x-user-navbar>
    @if (session('status'))
        <x-toast class="alert-info" message="{{ session('status') }}" id="message" />
    @endif
    <x-mockup action="{{ route('create.article') }}" method="POST" value-title="{{ old('title') }}"
        value-tag="{{ old('tag') }}" value-contain="{{ old('contain') }}" value-button="Add Article"
        method="POST" />
    <div class="divider my-6 ">
        <h1 class="font-bold text-2xl font-mono">Daftar Article</h1>
    </div>
    <div class="flex justify-center items-stretch flex-wrap gap-4 mt-3">
        @foreach ($data as $item)
            <x-card class="card w-96 bg-base-300 shadow-xl" title="{{ $item->title }}" tag="{{ $item->tag }}"
                description="{{ $item->description }}">
                <div class="card-actions justify-start items-center">
                    <a href="{{ route('tag.detail', ['tag' => $item->tag]) }}"
                        class="badge badge-inline capitalize">{{ $item->tag }}
                    </a>
                </div>
                <div class="card-actions justify-end items-center">
                    <form action="{{ route('delete.article', ['id' => $item->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-error btn-md rounded-xl">Delete</button>
                    </form>
                    <a href="{{ route('edit.article', ['slug' => $item->slug]) }}"
                        class="btn btn-md btn-warning rounded-xl">Edit </a>
            </x-card>
        @endforeach
    </div>
    <x-pagination current-page="{{ $meta['currentPage'] }}" next-page="{{ $meta['nextPage'] }}"
        prev-page="{{ $meta['prevPage'] }}" />
</x-user-layout>
