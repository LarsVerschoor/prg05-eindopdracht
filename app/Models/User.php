<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }

    public function postsLiked(): HasMany {
        return $this->hasMany(PostLike::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

    public function commentsLiked(): HasMany {
        return $this->hasMany(CommentLike::class);
    }

    public function following(): HasMany {
        return $this->hasMany(UserFollower::class, 'user_id');
    }

    public function followers(): hasMany {
        return $this->hasMany(UserFollower::class, 'followed_user_id');
    }
}
