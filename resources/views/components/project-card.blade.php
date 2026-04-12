@foreach ($projects as $project)
    @php
        $isDefault = empty($project->image_url);
    @endphp

    <div class="project-card">

        <!-- IMAGE -->
        <div class="project-image">
            <img src="{{ $project->image_url ?: asset('image/no-img.svg') }}"
                onerror="this.onerror=null;this.src='{{ asset('image/no-img.svg') }}';" alt="{{ $project->name }}"
                class="project-img {{ $isDefault ? 'default-img' : '' }}">

            <span class="project-category">
                {{ $project->type ?? 'Project' }}
            </span>
        </div>

        <!-- CONTENT -->
        <div class="project-content">

            <h3>{{ $project->name }}</h3>

            <p>
                {{ Str::limit($project->description, 90) }}
            </p>

            <!-- META -->
            <div class="project-meta">
                <span>{{ $project->type ?? 'General' }}</span>

                @if ($project->github_url)
                    <span>GitHub</span>
                @endif
            </div>

            <!-- ACTION -->
            <div class="project-actions">
                <a href="{{ route('project.show', $project->slug) }}" class="btn btn-primary">
                    Lihat Detail
                </a>
            </div>

        </div>

    </div>
@endforeach
