<?php

namespace App;

use Auth;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    //

    protected $fillable = ['title','content','user_id','channel_id','slug'];


    public function channel(){
        return $this->belongsTo('App\Channel');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }


    public function replies(){
        return $this->hasMany('App\Reply');
    }

    public function watchers(){
        return $this->hasMany('App\Watcher');
    }

    public function isWatchedByAuthUser(){

       
        $watchers = [];

        foreach($this->watchers as $watcher):
            array_push($watchers,$watcher->user_id);
        endforeach;
     

        if(in_array(Auth::id(),$watchers)){
            return true;
        }else{
            return false;
        }
         
    }

    public function hasBestAnwser(){
            $result = false;
        foreach($this->replies as $reply):
            if($reply->best_anwser){
                $result = true;
            }
        endforeach;

        return $result;
       

    }
}
