<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\tags;

class Recipe extends Model
{
    use HasFactory, Searchable;

    public function toSearchableArray()
    {
        return [
            'title' => $this->title
        ];
    }

    public function tags()
{
    return $this->belongsToMany(tags::class, 'recipe_tags', 'recipe_id', 'tag_id');
}
}
