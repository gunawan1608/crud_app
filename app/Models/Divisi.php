<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class divisi extends Model
{
    protected $table = 'divisis';

    protected $fillable = [
        'nama_divisi',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
