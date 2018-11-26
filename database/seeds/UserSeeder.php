<?php

use Illuminate\Database\Seeder;
use App\Models\Auth\User;
use App\Models\Blog\Post;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)
            ->create()
            ->each(function (User $user) {
                $user->posts()->saveMany(factory(Post::class, 3)->make());
            });
    }
}
