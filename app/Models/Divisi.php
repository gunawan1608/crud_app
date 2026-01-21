<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisis';

    protected $fillable = [
        'nama_divisi',
        'color',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Generate random color untuk divisi
     */
    public static function generateRandomColor()
    {
        $colors = [
            '#EF4444', // red
            '#F97316', // orange
            '#F59E0B', // amber
            '#84CC16', // lime
            '#10B981', // emerald
            '#14B8A6', // teal
            '#06B6D4', // cyan
            '#3B82F6', // blue
            '#6366F1', // indigo
            '#8B5CF6', // violet
            '#A855F7', // purple
            '#EC4899', // pink
            '#F43F5E', // rose
        ];

        return $colors[array_rand($colors)];
    }

    /**
     * Get contrasting text color (light or dark) based on background
     */
    public function getTextColorAttribute()
    {
        $color = $this->color;

        // Remove # if present
        $color = ltrim($color, '#');

        // Convert to RGB
        $r = hexdec(substr($color, 0, 2));
        $g = hexdec(substr($color, 2, 2));
        $b = hexdec(substr($color, 4, 2));

        // Calculate luminance
        $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;

        // Return dark text for light backgrounds, light text for dark backgrounds
        return $luminance > 0.5 ? '#1F2937' : '#FFFFFF';
    }
}
