<div class="flex justify-center items-center my-2 p-3">
    <div class="btn-group">
        @if ($prevPage)
            <a href="{{ $prevPage }}" class="btn btn-outline">«</a>
        @endif
        <button class="btn btn-ghost">{{ $currentPage }}</button>
        @if ($nextPage)
            <a href="{{ $nextPage }}" class="btn btn-outline">»</a>
        @endif
    </div>
</div>
