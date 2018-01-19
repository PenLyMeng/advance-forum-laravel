<?php

use Illuminate\Database\Seeder;
use App\Reply;
class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $r1 = [
            'user_id' => 3,
            'discussion_id' => 1,
            'best_anwser' => 0,
            'content' => 'Yes go on!',

        ];

        $r2 = [
            'user_id' => 3,
            'discussion_id' => 2,
            'best_anwser' => 0,
            'content' => 'Yes go on!',

        ];
        $r3 = [
            'user_id' => 3,
            'discussion_id' => 3,
            'best_anwser' => 0,
            'content' => 'Yes go on!',

        ];
        $r4 = [
            'user_id' => 3,
            'discussion_id' => 4,
            'best_anwser' => 0,
            'content' => 'Yes go on!',

        ];

        $r5 = [
            'user_id' => 3,
            'discussion_id' => 5,
            'best_anwser' => 0,
            'content' => 'Yes go on!',

        ];
        $r6 = [
            'user_id' => 3,
            'discussion_id' => 5,
            'best_anwser' => 0,
            'content' => 'I am really interesting in this discussion too!',

        ];

        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);
        Reply::create($r5);
        Reply::create($r6);
    }
}
