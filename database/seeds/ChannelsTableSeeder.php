<?php

use Illuminate\Database\Seeder;
use App\Channel;
class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $channel1 = ['title' => 'Laravel 5.4','slug' => str_slug('Laravel 5.4')];
        $channel2 = ['title' => 'ReactJs','slug' => str_slug('ReactJs')];
        $channel3 = ['title' => 'VueJs','slug' => str_slug('VueJs')];
        $channel4 = ['title' => 'AngularJs','slug' => str_slug('AngularJs')];
        $channel5 = ['title' => 'Web Development','slug' => str_slug('Web Development')];
      
        
        App\Channel::create($channel1);
        App\Channel::create($channel2);
        App\Channel::create($channel3);
        App\Channel::create($channel4);
        App\Channel::create($channel5);
        
    }
}
