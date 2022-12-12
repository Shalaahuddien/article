<x-guest-layout>
    <x-slot name="title">
        Error
    </x-slot>
    <x-navbar pageActive="Error" />
    <div class="flex justify-center items-center min-h-screen">
        <h2 class="text-4xl">404 |</h2>
        <p class="font-thin text-xl">Maaf,Data <span class="underline decoration-wavy">{{ $data }}</span> tidak
            dapat kami
            temukan</p>
    </div>
</x-guest-layout>
