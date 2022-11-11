<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Spatie\Permission\Models\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'username' => 'user'.uniqid(),
            'email' => 'test@example.com',
            'phone' => '01969811565',
        ]);

        $role = Role::create(['name' =>  $user->username]);
    }
}
