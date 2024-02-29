<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! DB::table('users')->where('email', 'adminilm@sharklasers.com')->exists()) {
            DB::table('users')->insert([
                'name' => 'Admin ILM',
                'email' => 'adminilm@sharklasers.com',
                'role_user_id'  => 1,
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => Hash::make('superadmin789@'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }

        if (! DB::table('users')->where('email', 'customerilm@sharklasers.com')->exists()) {
            DB::table('users')->insert([
                'name' => 'Customer ILM',
                'email' => 'customerilm@sharklasers.com',
                'role_user_id'  => 2,
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => Hash::make('customerilm@'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
