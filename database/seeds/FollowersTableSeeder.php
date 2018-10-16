<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class FollowersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users       = User::all();
        $user        = $users->first();
        $user_id     = $user->id;
        $followers   = $users->slice(1);
        $follower_id = $followers->pluck('id')->toArray();
        $user->follow($follower_id);
        foreach ($followers as $follower) {
            $follower->follow($user_id);
        }
    }
}
