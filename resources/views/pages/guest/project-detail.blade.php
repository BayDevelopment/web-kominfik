<x-layouts.guest>
    <section class="project-detail">
        <div class="container">

            <h1>{{ $project->name }}</h1>

            <img src="{{ $project->image_url ?: asset('image/no-img.svg') }}"
                onerror="this.onerror=null;this.src='{{ asset('image/no-img.svg') }}';" alt="{{ $project->name }}"
                class="project-img">


            <p>{{ $project->description }}</p>

            <div style="margin-top:20px; display:flex; gap:12px; flex-wrap:wrap;">

                @if ($project->demo_url)
                    <a href="{{ $project->demo_url }}" class="btn btn-primary" target="_blank" rel="noopener">
                        Live Demo
                    </a>
                @endif

                @if ($project->github_url)
                    <a href="{{ $project->github_url }}" class="btn btn-outline" target="_blank" rel="noopener">
                        GitHub
                    </a>
                @endif

            </div>

        </div>
    </section>

    <x-slot:styles>
        <style>
            .project-img {
                width: 100%;
                height: 180px;
                /* 🔥 kontrol tinggi */
                object-fit: cover;
                /* isi penuh (untuk gambar normal) */
                border-radius: 12px;
                background: #f1f5f9;
                /* fallback background */
            }
        </style>
    </x-slot:styles>
</x-layouts.guest>
