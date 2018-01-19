<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Discussion;
use App\Channel;
use Auth;

class ForumsController extends Controller
{
    //

    public function index(){

        //$dicussions = Discussion::orderBy('created_at','desc')->paginate(5);

        switch(request('filter')){

            case 'me':
                $results = Discussion::where('user_id',Auth::id())->orderBy('created_at','desc')->paginate(5);
            break;

            case 'solved':
               $closedDiscussion = array();

               foreach(Discussion::all() as $discussion):
                      
                        if($discussion->hasBestAnwser()){
                            array_push($closedDiscussion, $discussion);
                        }
               endforeach;

                $results = new Paginator($closedDiscussion,5);

            break;

            case 'unsolved':
            $openedDiscussion = array();

            foreach(Discussion::all() as $discussion):
                   
                     if(!$discussion->hasBestAnwser()){
                         array_push($openedDiscussion, $discussion);
                     }
            endforeach;

             $results = new Paginator($openedDiscussion,5);

 

            break;
            default:
                $results = Discussion::orderBy('created_at','desc')->paginate(5);
            break;
        }



        return view('forum',['discussions' => $results]);

    }

    public function channel($slug){
       

        $channel = Channel::where('slug',$slug)->first(); 
      
        return view('channel')->with('channel',$channel->title)->with('discussions' , $channel->discussions()->paginate(5));
       
         

        
    }
     
}
