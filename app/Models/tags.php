<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    use HasFactory;
    public function recipes()
{
    return $this->belongsToMany(Recipe::class, 'recipe_tags', 'tag_id', 'recipe_id');
}

}
