<?php

namespace App\Http\Controllers;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        DB::enableQueryLog();

        $users = User::with("posts")->get();

        foreach ($users as $user) {
            dump($user->posts);
        }

        dump(DB::getQueryLog());

        return view('welcome');
    }
}
