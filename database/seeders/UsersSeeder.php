<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'usr_name' => 'admin',
            'usr_email' => 'Admin@gmail.com',
            'usr_password' => bcrypt('admin01'),
        ]);
    }
}
