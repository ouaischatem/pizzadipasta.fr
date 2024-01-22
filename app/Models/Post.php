<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $disk = 'public';

    protected $fillable = [
        'id',
        'image',
        'title',
        'description',
        'content',
        'quote',
        'visible'
    ];

    /**
     * Scope pour récupérer les postes visibles
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeVisible($query)
    {
        return $query->where('visible', 1);
    }
}
