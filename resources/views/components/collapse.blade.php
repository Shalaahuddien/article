<div class="flex justify-center items-center px-3 py-2  ">
    <div class="w-full md:w-2/3 collapse collapse-arrow border border-base-300 bg-base-100 rounded-box">
        <input type="checkbox" />
        <div class="collapse-title text-xl font-medium  text-center">
            {{ $titleTag }}
        </div>
        <div class="collapse-content">
            {{ $slot }}
        </div>
    </div>
</div>
