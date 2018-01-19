<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Reply;
use Auth;
use Session;
use App\Discussion;
class RepliesController extends Controller
{
    //

    public function like($id){
        Like::create([ 
             'user_id' => Auth::id(),
             'reply_id' => $id,
             
             ]);

             return redirect()->back();

    }
    public function unlike($id){
       $like = Like::where(['user_id' => Auth::id()],['reply_id',$id])->delete();

       return redirect()->back();
            
    }

    public function markAsBestAnwser($id){
       $reply = Reply::find($id);
       $reply->best_anwser = 1;
       $reply->save();
       $reply->user->points += 50;
       $reply->user->save();
       
       Session::flash('success','Reply have been marked as best anwser!');

       return redirect()->back();
             
     }

     public function edit($id){
        $reply = Reply::find($id);
        return view('replies.edit')->with('reply',$reply);
              
      }


      public function update($id){
        
        $this->validate(request(),[
            'content' => 'required',
            
        ]);

        $reply = Reply::find($id);
        $reply->content = request()->content;
        $reply->save();
        
        Session::flash('success','Reply updated successfully');
 

        return redirect()->route('discussion',['slug' =>  $reply->discussion->slug]);
      
    }
}
