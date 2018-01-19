<?php

use Illuminate\Database\Seeder;
use App\Watcher;

class WatchersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $watcher1 = ['user_id'=>"2",'discussion_id'=>"1"];
        $watcher2 = ['user_id'=>"3",'discussion_id'=>"1"];
        $watcher3 = ['user_id'=>"4",'discussion_id'=>"1"];
      

        Watcher::create($watcher1);
        Watcher::create($watcher2);
        Watcher::create($watcher3);
         



    }
}
