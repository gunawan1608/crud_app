<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Arsip extends Model
{
    protected $fillable = [
        'nomor_arsip',
        'judul',
        'keterangan',
        'file_path',
        'file_name',
        'file_type',
        'file_size',
        'tanggal_arsip',
        'divisi_id',
        'user_id',
    ];

    protected $casts = [
        'tanggal_arsip' => 'date',
    ];

    /**
     * Relasi ke tabel Divisi
     */
    public function divisi(): BelongsTo
    {
        return $this->belongsTo(Divisi::class);
    }

    /**
     * Relasi ke tabel User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Helper untuk format ukuran file dalam satuan yang mudah dibaca
     */
    public function getFileSizeFormattedAttribute(): string
    {
        $bytes = $this->file_size;

        if ($bytes >= 1048576) { // >= 1 MB
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }

        return $bytes . ' bytes';
    }

    /**
     * Scope untuk filter arsip berdasarkan divisi
     */
    public function scopeForDivisi($query, $divisiId)
    {
        return $query->where('divisi_id', $divisiId);
    }
}
