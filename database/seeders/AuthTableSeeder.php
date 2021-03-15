<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class AuthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
           'email'=>'info@trailanalytics.com',
           'password'=>Hash::make('admin'),
           'role'=>'admin',
           'name'=>'admin'
        ]);
    }
}
