<div class="mockup-window border bg-base-300 lg:max-w-4xl md:max-w-2xl sm:max-w-md m-5 sm:mx-auto">
    <form {{ $attributes }}>
        @method('POST')
        @csrf
        <div class="flex justify-start flex-col flex-wrap px-4 py-12 bg-base-200">
            <div class="form-control w-full max-w-full">
                <label class="label">
                    <span class="label-text font-base text-md font-serif ml-2">Title Article</span>
                </label>
                <input type="text" placeholder="Type here" class="input input-bordered input-md w-full max-w-full"
                    name="title" value="{{ $valueTitle }}" />
                @error('title')
                    <x-alert class="alert-error my-2 text-sm" message="{{ $message }}" />
                @enderror
            </div>
            <div class="form-control w-full max-w-full">
                <label class="label">
                    <span class="label-text font-base text-md font-serif ml-2">Isi Article</span>
                </label>
                <textarea class="textarea textarea-bordered h-24" name="contain" placeholder="Bio">{{ $valueContain }}</textarea>
                @error('contain')
                    <x-alert class="alert-error my-2 text-sm" message="{{ $message }}" />
                @enderror
            </div>
            <div class="form-control w-full max-w-full">
                <label class="label">
                    <span class="label-text font-base text-md font-serif ml-2">Tag</span>
                </label>
                <input type="text" placeholder="Type here" class="input input-bordered input-md w-full max-w-full"
                    name="tag" value="{{ $valueTag }}" />
                @error('tag')
                    <x-alert class="alert-error my-2 text-sm" message="{{ $message }}" />
                @enderror
            </div>
            <div class="form-control mt-6">
                <button type="submit" class="btn  hover:bg-black">{{ $valueButton }}</button>
            </div>
        </div>
    </form>
</div>
