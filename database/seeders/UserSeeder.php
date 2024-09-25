<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user=new User();
        $user->name='Admin';
        $user->email='admin@gmail.com';
        $user->password=bcrypt('12345678');
        $user->save();
        $user->assignRole('admin');


        $user=new User();
        $user->name='User';
        $user->email='User@gmail.com';
        $user->password=bcrypt('12345678');
        $user->save();
        $user->assignRole('user');



    }
}
