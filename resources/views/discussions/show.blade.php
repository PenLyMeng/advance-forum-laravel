@extends('layouts.app')

@section('content')
 
@if($discussion->hasBestAnwser())
    <div class="panel panel-danger">
@else
    <div class="panel panel-info">
@endif

<div class="panel-heading">
    <img src="{{asset($discussion->user->avatar)}}" alt="{{$discussion->user->avatar}}" width="32px" height="32px">&nbsp;
    <span>{{$discussion->user->name}}({{$discussion->user->points}})  <b>{{$discussion->created_at->diffForHumans()}}</b></span>
   
    @if($discussion->isWatchedByAuthUser())
        <a href="{{route('discussion.unwatch',['discussion_id' => $discussion->id])}}" class="btn btn-xs btn-danger pull-right">Unwatch</a>
    @else
        <a href="{{route('discussion.watch',['discussion_id' => $discussion->id])}}" class="btn btn-xs btn-default pull-right">watch</a>
    @endif

    @if($discussion->hasBestAnwser())
        <span class="badge">CLOSED</span>
    @else
        <span class="badge">OPEN</span>
        <a href="{{route('discussions.edit',['discussion_id' => $discussion->id])}}" class="btn btn-xs btn-warning pull-right" style="margin-right:4px">edit</a>
 
    @endif


</div>

<div class="panel-body">
    @if(!$best_anwser)
        <h2> 
            {{$discussion->title}}
        </h2>
        <p>
            {!! Markdown::convertToHtml($discussion->content) !!}  
        </p>
    @else
        <h2> 
            {{$discussion->title}}
        </h2>
        <p>
            {!! Markdown::convertToHtml($discussion->content) !!}  
        </p>  

        <br/><hr/>

       @foreach($discussion->replies as $reply)
            @if($reply->best_anwser)
            <div class="panel panel-success text-center">
                    <div class="panel-heading">
                                <img src="{{asset($reply->user->avatar)}}" alt="{{$reply->user->avatar}}" width="32px" height="32px">&nbsp;
                                <span>{{$reply->user->name}}({{$reply->user->points}})  <b>{{$reply->created_at->diffForHumans()}}</b></span>
                                <span class="badge badge-success">best anwser</span>
                    </div>
                
                <div class="panel-body">
                        <p>
                            {{$reply->content}}
                        </p>
                </div>
        
            </div>
            @endif
       @endforeach
    @endif
</div>

<div class="panel-footer">

    @if($discussion->replies->count()>1)
        <p>{{$discussion->replies->count() .' replies'}}</p>
    @else
        <p>{{$discussion->replies->count() .' reply'}}</p>
    @endif

</div>
</div>


<div class="panel panel-danger">  
    <div class="panel-heading">Replies</div>
     <div class="panel-body">
   @foreach($discussion->replies as $reply)
   <div class="panel panel-warning">
    <div class="panel-heading">
        <img src="{{asset($reply->user->avatar)}}" alt="{{$reply->user->avatar}}" width="32px" height="32px">&nbsp;
        <span>{{$reply->user->name}}({{$reply->user->points}}) <b>{{$reply->created_at->diffForHumans()}}</b></span>
      
        @if(!$best_anwser)
            @if(Auth::id() == $discussion->user->id)
                <a href="{{route('reply.mark_as_best',['replyId' => $reply->id])}}" class="btn btn-xs btn-info pull-right">mark as best anwser</a>
            @endif
        @endif

        @if(Auth::id() == $reply->user->id AND !$reply->best_awnser )
            <a href="{{route('replies.edit',['replyId' => $reply->id])}}" style="margin-right:4px" class="btn btn-xs btn-warning pull-right">edit</a>
        @endif

      
        
    </div>

<div class="panel-body">
       <p>
           {!!Markdown::convertToHtml($reply->content)!!}
       </p>
</div>

<div class="panel-footer">
    @if($reply->isLikedByAuthUser())
        <a href="{{route('reply.unlike',['replyId' => $reply->id])}}" class="btn btn-xs btn-danger">Unlike</a>
     @else
        <a href="{{route('reply.like',['replyId' => $reply->id])}}" class="btn btn-xs btn-success">Like</a>
    @endif
    <span style="font-size:18px" class="badge pull-right">
        @if($reply->totalLikes() == 0)

        @elseif($reply->totalLikes() == 1)
            1 like
        @elseif($reply->totalLikes() > 1)
        {{$reply->totalLikes()}} .' likes'
        @endif
    </span>
 
</div>

 
</div>
   @endforeach
    </div>

    <div class="panel-footer">
        @if(Auth::check())
        <div class="panel panel-default">
    
                <div class="panel-body">
                <form  action="{{route('discussion.reply',['id' => $discussion->id])}}" method="POST">
                   {{csrf_field()}}
                   
                    <div class="form-group">
                    <label for="reply">Leave a reply...</label>
                        <textarea class="form-control" name="reply" id="reply" cols="30" rows="10" class="form-control" >
                                               
                        </textarea>
                    </div>
        
                    <button type="submit" class="btn btn-success pull-right">
                        submit reply
                    </button>
        
                </form>
                </div>
        
        
                </div>
        

        @else
                <div class="panel panel-default">
                        <div class="panel-heading text-center">
                                    <h1>Please login to leave replies...</h1>
                        </div>

                        <div class="panel-body text-center">
                            <a class='btn btn-default' href="{{route('login')}}">Login</a>
                        </div>
                </div>
        
        @endif
    </div>


</div>
  

  
 
    
@endsection
