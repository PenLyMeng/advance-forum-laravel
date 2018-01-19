<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Reply extends Model
{
    //

    protected $fillable = ['content','user_id','discussion_id','best_anwser'];


    public function discussion(){
        return $this->belongsTo('App\Discussion');
    }

 
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function isLikedByAuthUser(){

       
        $likers = [];

        foreach($this->likes as $like):
            array_push($likers,$like->user_id);
        endforeach;
     

        if(in_array(Auth::id(),$likers)){
            return true;
        }else{
            return false;
        }
         
    }

    public function totalLikes(){

       
            return $this->likes->count();  
         
             
    }

}
