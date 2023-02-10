<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrNew([
            'email' => 'admin@example.com'
        ]);
        $user->name = 'Admin';
        $user->password = Hash::make('admin');
        $user->save();
    }
}
