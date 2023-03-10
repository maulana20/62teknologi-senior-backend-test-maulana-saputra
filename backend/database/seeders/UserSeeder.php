<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
