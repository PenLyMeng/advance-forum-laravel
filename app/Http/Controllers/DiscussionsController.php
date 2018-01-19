<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use Auth;
use Session;
use App\Reply;
use App\User;
use Notification;
use App\Notifications\NewReplyAdded;

class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

  
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('discuss');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
          

        $this->validate(request(),[
            'channel_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            
        ]);


        $discussion = Discussion::create([
            'user_id' => Auth::id(),
            'channel_id' => request()->channel_id,
            'title' => request()->title,
            'content' => request()->content,
            'slug' => str_slug(request()->title),
          
            

         ]);

         Session::flash('success','Discussion created successfully!');

         return redirect()->route('discussion',['slug' => $discussion->title]);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
       
        $discussion = Discussion::where('slug',$slug)->first();
        $best_anwser = $discussion->replies()->where('best_anwser',1)->first();


        return view('discussions.show')->with('discussion',$discussion)->with('best_anwser',$best_anwser);
    }

    public function reply($id)
    {   
        $discussion = Discussion::find($id);


        dd(request()->reply);

        $this->validate(request(),[
            'reply' => 'required',
        ]);

       $reply = Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => request()->reply,
            'best_anwser' => 0,
        ]);

        $reply->user->points += 25;
        $reply->user->save();

        
        $watchers = array();

        foreach($discussion->watchers as $watcher):
                array_push( $watchers,User::find($watcher->user_id));
        endforeach;

        Notification::send($watchers,New NewReplyAdded($discussion));


        Session::flash("success",'Reply successfully!');

        return redirect()->back();
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
            $discussion = Discussion::find($id);
            return view('discussions.edit')->with('discussion',$discussion);
    }


 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    
        //
            $this->validate($request,['content'=>'required']);

            $discussion = Discussion::find($id);
            $discussion->content = $request->content;
            $discussion->save();

            Session::flash('success','Discussion updated successfully');

            return redirect()->route('forum');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
