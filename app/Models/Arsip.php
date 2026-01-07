<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Arsip extends Model
{
    protected $fillable = [
        'nomor_arsip',
        'judul',
        'keterangan',
        'kategori',  // TAMBAHKAN INI (untuk dropdown kategori)
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
     * FIX: Helper untuk format ukuran file dalam satuan yang mudah dibaca
     * Dipakai lewat: $arsip->file_size_formatted
     */
    public function getFileSizeFormattedAttribute(): string
    {
        $bytes = $this->getFileSizeBytesAttribute();

        if ($bytes >= 1048576) { // >= 1 MB
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }

        return $bytes . ' bytes';
    }

    /**
     * FIX: Get file size in bytes - perbaiki path storage
     * Dipakai lewat: $arsip->file_size_bytes
     */
    public function getFileSizeBytesAttribute(): int
    {
        // Prioritas 1: Gunakan file_size dari database (lebih cepat)
        if (!empty($this->attributes['file_size'])) {
            return (int) $this->attributes['file_size'];
        }

        // Prioritas 2: Hitung dari storage
        // FIX: Tanpa prefix 'public/' karena sudah pakai disk('public')
        if (!empty($this->file_path) && Storage::disk('public')->exists($this->file_path)) {
            return Storage::disk('public')->size($this->file_path);
        }

        return 0;
    }

    /**
     * Scope untuk filter arsip berdasarkan divisi
     */
    public function scopeForDivisi($query, $divisiId)
    {
        return $query->where('divisi_id', $divisiId);
    }
}