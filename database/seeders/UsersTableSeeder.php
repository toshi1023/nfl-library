<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'root',
            'email'             => config('const.RootMailAddress'),
            'password'          => Hash::make(config('const.RootPassword')),
            'favorite_season'   => 2013,
            'favorite_team'     => 31
        ]);
    }
}
