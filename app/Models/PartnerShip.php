<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerShip extends Model
{
    protected $table = 'partnerships';
    protected $fillable = [
        'instansi_nama',
        'instansi_email',
        'instansi_phone',
        'pic_name',
        'deskripsi',
        'status',
        'submitted_at',
        'notes',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
    ];
}
