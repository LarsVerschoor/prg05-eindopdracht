<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

    public function tags(): HasMany {
        return $this->hasMany(Tag::class);
    }

    public function likes(): HasMany {
        return $this->hasMany(PostLike::class);
    }

    public function cars(): HasMany {
        return $this->hasMany(Car::class);
    }
}
