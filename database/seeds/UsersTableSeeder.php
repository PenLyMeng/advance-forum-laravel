<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'lymeng',
            'password' => bcrypt('admin'),
            'email' => 'pen.lymeng@smart.com.kh',
            'admin' => '1',
            'avatar' => 'avatars/admin-avatar.jpg',
            
        ]);

         User::create([
            'name' => 'lyheak',
            'password' => bcrypt('user'),
            'email' => 'pen.lyheak@smart.com.kh',
            'avatar' => 'avatars/avatar.jpg',
            
        ]);

         User::create([
            'name' => 'Mark',
            'password' => bcrypt('user'),
            'email' => 'mark@gmail.com',
            'avatar' => 'avatars/avatar.jpg',
            
        ]);

        User::create([
            'name' => 'Roth',
            'password' => bcrypt('user'),
            'email' => 'roth@gmail.com',
            'avatar' => 'avatars/avatar.jpg',
            
        ]);

        User::create([
            'name' => 'Lundy',
            'password' => bcrypt('user'),
            'email' => 'lundy@gmail.com',
            'avatar' => 'avatars/avatar.jpg',
            
        ]);

        User::create([
            'name' => 'Visal',
            'password' => bcrypt('user'),
            'email' => 'visal@gmail.com',
            'avatar' => 'avatars/avatar.jpg',
            
        ]);

        User::create([
            'name' => 'Vathana',
            'password' => bcrypt('user'),
            'email' => 'vathana@gmail.com',
            'avatar' => 'avatars/avatar.jpg',
            
        ]);

        User::create([
            'name' => 'Kimsie',
            'password' => bcrypt('user'),
            'email' => 'kimsie@gmail.com',
            'avatar' => 'avatars/avatar.jpg',
            
        ]);

        User::create([
            'name' => 'Votey',
            'password' => bcrypt('user'),
            'email' => 'votey@gmail.com',
            'avatar' => 'avatars/avatar.jpg',
            
        ]);
    }
}
