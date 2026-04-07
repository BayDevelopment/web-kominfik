<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RegistrationTypModel extends Model
{
    use HasFactory;

    protected $table = 'registration_types';

    protected $fillable = [
        'name',
        'slug',
        'is_open',
        'start_date',
        'end_date',
        'description',
    ];

    protected $casts = [
        'is_open' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | 🔥 ACCESSOR (Logic status buka/tutup)
    |--------------------------------------------------------------------------
    */

    public function getIsAvailableAttribute()
    {
        if (!$this->is_open) {
            return false;
        }

        if ($this->start_date && now()->lt($this->start_date)) {
            return false;
        }

        if ($this->end_date && now()->gt($this->end_date)) {
            return false;
        }

        return true;
    }

    /*
    |--------------------------------------------------------------------------
    | 🔍 SCOPE (biar query clean)
    |--------------------------------------------------------------------------
    */

    public function scopeOpen($query)
    {
        return $query->where('is_open', true);
    }

    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    // SLUG
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
}
