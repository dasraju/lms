<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        \App\Models\Admin::create([
            'name' => 'Test admin',
            'email' => 'admin@gmail.com',
            'phone' => '01969811565',
            'password' =>  Hash::make('123456'),
        ]);
    }
}
