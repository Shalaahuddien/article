<x-guest-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    @if (session('token'))
        <x-user-navbar page-active="{{ $title }}" />
    @else
        <x-navbar page-active="{{ $title }}" />
    @endif
    <x-table>
        @foreach ($data as $item)
            <tr class="hover">
                <th>{{ $increment++ }}</th>
                <td><a href="{{ route('tag.detail', ['tag' => $item->tag]) }}"
                        class="badge badge-primary text-center">{{ $item->tag }}</a></td>
                <td>{{ $sumArticle[$item->tag] }} Article</td>
            </tr>
        @endforeach
    </x-table>

</x-guest-layout>
