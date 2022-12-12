    <div {{ $attributes }}>
        <div class="card-body">
            <h2 class="card-title">{{ $title }}</h2>
            <p>{{ $description }}</p>
            
                {{ $slot }}
            </div>
        </div>
    </div>
