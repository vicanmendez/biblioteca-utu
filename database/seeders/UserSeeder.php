<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\App\Models\User::count() == 0) {
            DB::table('users')->insert([
                'name' => 'admin',
                'username' => 'admin',
                'password' => bcrypt('utupass')
            ]);
        }
    }
}
