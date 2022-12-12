<x-guest-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    @if (session('token'))
        <x-user-navbar page-active="{{ $title }}" />
    @else
        <x-navbar page-active="{{ $title }}" />
    @endif
    <x-collapse title-tag="{{ $titleTag }}">
        <ul class="menu bg-base-100">
            @foreach ($data as $item)
                <li class="hover:hover-bordered"><a
                        href="{{ route('article.show', ['slug' => $item->slug]) }}">{{ $item->title }}</a></li>
            @endforeach
        </ul>
    </x-collapse>
</x-guest-layout>
