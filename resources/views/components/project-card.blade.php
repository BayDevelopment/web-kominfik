@foreach ($projects as $project)
    <div class="project-card">
        <div class="project-image">
            <img src="{{ $project->image_url ?? asset('assets/default-project.webp') }}">
        </div>

        <div class="project-body">
            <h3>{{ $project->name }}</h3>
            <p>{{ Str::limit($project->description, 90) }}</p>

            <a href="{{ route('project.show', $project->slug) }}" class="btn btn-primary">
                Lihat Detail
            </a>
        </div>
    </div>
@endforeach
