<x-layouts.guest>
    <section class="project-detail">
        <div class="container">

            <h1>{{ $project->name }}</h1>

            <img src="{{ $project->image_url ?? asset('assets/default-project.webp') }}" alt="{{ $project->name }}"
                style="max-width:100%; margin:20px 0;">

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
</x-layouts.guest>
