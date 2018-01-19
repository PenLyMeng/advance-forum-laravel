<?php

use Illuminate\Database\Seeder;

use App\Discussion;

class DiscussionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $lorem = "At vero eos et accusamus et iusto odio 
                  dignissimos ducimus qui blanditiis praesentium 
                  voluptatum deleniti atque corrupti quos dolores et 
                  quas molestias excepturi sint occaecati cupiditate non 
                  provident, similique sunt in culpa qui officia deserunt 
                  mollitia animi, id est laborum et dolorum fuga. Et harum 
                  quidem rerum facilis est et expedita distinctio. Nam 
                  libero tempore, cum soluta nobis est eligendi optio 
                  cumque nihil impedit quo minus id quod maxime placeat 
                  facere possimus, omnis voluptas assumenda est, omnis 
                  dolor repellendus. Temporibus autem quibusdam et aut 
                  officiis debitis aut rerum necessitatibus saepe eveniet 
                  ut et voluptates repudiandae sint et molestiae non 
                  recusandae. Itaque earum rerum hic tenetur a sapiente 
                  delectus, ut aut reiciendis voluptatibus maiores alias 
                  consequatur aut perferendis doloribus asperiores 
                  repellat.";

        $disct1 = 'ReactJs vs VueJs vs AngularJs';
        $disct2 = 'Android vs Ios Development';
        $disct3 = 'Laravel vs CakePhp';
        $disct4 = 'Native Mobile vs Hybrid App';
        $disct5 = 'Can Laravel work with React?';
        $disct6 = 'Which framework will be the future of web development?';
        $disct7 = 'Facebook vs Google';
        $disct8 = 'What is React Fiber?';
        $disct9 = 'NoSql vs Sql Database';
        $disct10 = 'Firebase vs MongoDb';



         Discussion::create([
            'title' => $disct1,
            'user_id' => 1,
            'channel_id' => 2,
            'content' => "How do you think?",
            'slug' => str_slug($disct1), 
        ]);
         Discussion::create([
            'title' => $disct2,
            'user_id' => 1,
            'channel_id' => 1,
            'content' => "How do you think?",
            'slug' => str_slug($disct2), 
        ]);
         Discussion::create([
            'title' => $disct3,
            'user_id' => 1,
            'channel_id' => 4,
            'content' => "How do you think?",
            'slug' => str_slug($disct3), 
        ]);
        Discussion::create([
            'title' => $disct4,
            'user_id' => 2,
            'channel_id' => 1,
            'content' => "How do you think?",
            'slug' => str_slug($disct4), 
        ]);
        
        Discussion::create([
            'title' => $disct5,
            'user_id' => 2,
            'channel_id' => 1,
            'content' => $lorem,
            'slug' => str_slug($disct5), 
        ]);

   Discussion::create([
            'title' => $disct6,
            'user_id' => 2,
            'channel_id' => 1,
            'content' =>  $lorem,
            'slug' => str_slug($disct6), 
        ]);
        Discussion::create([
            'title' => $disct7,
            'user_id' => 2,
            'channel_id' => 1,
            'content' =>  $lorem,
            'slug' => str_slug($disct7), 
        ]);
        Discussion::create([
            'title' => $disct8,
            'user_id' => 2,
            'channel_id' => 1,
            'content' =>  $lorem,
            'slug' => str_slug($disct8), 
        ]);
        Discussion::create([
            'title' => $disct9,
            'user_id' => 2,
            'channel_id' => 1,
            'content' =>  $lorem,
            'slug' => str_slug($disct9), 
        ]);
        Discussion::create([
            'title' => $disct10,
            'user_id' => 2,
            'channel_id' => 1,
            'content' =>  $lorem,
            'slug' => str_slug($disct10), 
        ]);

    }
}
