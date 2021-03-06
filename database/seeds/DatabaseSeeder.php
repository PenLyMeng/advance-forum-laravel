<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(ChannelsTableSeeder::class);
         $this->call(DiscussionTableSeeder::class);
         $this->call(RepliesTableSeeder::class);
         $this->call(WatchersTableSeeder::class);
    }
}
