<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    public function posts(): BelongsToMany {
        return $this->belongsToMany(Post::class, 'post_car');
    }
}
