<?php

namespace App\Models\Auth;

use App\Models\Blog\Post;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Switch off auto-incrementing for the primary key.
     *
     * @var string
     */
    public $incrementing = false;

    /**
     * Set the primary key type to string.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Boot the Model.
     */
    public static function boot()
    {
        parent::boot();

        // Create a uuid for the primary key when creating a new instance.
        static::creating(function ($user) {
            $user->id = Str::uuid();
        });
    }

    /**
     * Define the posts relationship.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
