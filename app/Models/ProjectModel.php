<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'name',
        'slug',
        'image',
        'category',
        'author',
        'collaborator',
        'description',
        'demo_url',
        'github_url',
        'uploaded_at',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'uploaded_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::creating(function (ProjectModel $project) {
            if (blank($project->slug)) {
                $project->slug = Str::slug($project->name);
            }
        });

        static::updating(function (ProjectModel $project) {
            if (blank($project->slug)) {
                $project->slug = Str::slug($project->name);
            }
        });

        static::deleting(function ($project) {

            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
        });
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        return asset('storage/' . $this->image);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderByDesc('uploaded_at');
    }
}
