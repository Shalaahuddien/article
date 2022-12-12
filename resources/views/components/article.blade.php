<article class="container p-8 space-y-14 ">
    <div class="flex justify-center items-center flex-col flex-wrap lg:w-2/4 w-full  lg:justify-start lg:items-start">
        <small class="text-start text-sm font-medium uppercase text-gray-500 ">{{ $tag }} |
            {{ date('F j Y', strtotime($date)) }}</small>
        <h2 class="text-4xl md:text-5xl  font-bold font-serif text-center lg:text-start ">{{ $title }}</h2>
    </div>
    <div class="lg:w-5/6 w-full">
        <p class="text-lg md:text-xl font-semibold font-sans text-justify tracking-wide indent-14 lg:indent-0">
            {{ $contain }}</p>
    </div>
</article>
