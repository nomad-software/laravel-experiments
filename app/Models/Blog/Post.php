<?php

namespace App\Models\Blog;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
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
        "text",
        "title",
    ];

    /**
     * Auto-convert dates to carbon.
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Boot the Model.
     */
    public static function boot()
    {
        parent::boot();

        // Create a uuid for the primary key when creating a new instance.
        static::creating(function ($post) {
            $post->id = Str::uuid();
        });
    }

    /**
     * Define the user relationship.
     */
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
