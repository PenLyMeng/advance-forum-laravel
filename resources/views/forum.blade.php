@extends('layouts.app')

@section('content')
 
@foreach($discussions as $discussion)
 
@if($discussion->hasBestAnwser())
    <div class="panel panel-danger">
@else
    <div class="panel panel-info">
@endif
    <div class="panel-heading"> 
        <img src="{{$discussion->user->avatar}}" alt="{{$discussion->user->avatar}}" width="32px" height="32px">&nbsp;
        <span>{{$discussion->user->name}}({{$discussion->user->points}}) <b>{{$discussion->created_at->diffForHumans()}}</b></span>
        
       
        <a href="{{route('discussion',['slug' => $discussion->slug])}}" class="btn btn-xs btn-default pull-right">view</a>
      
        @if(Auth::id() == $discussion->user->id)
            <a href="{{route('discussions.edit',['id' => $discussion->id])}}" style="margin-right:4px" class="btn btn-xs btn-warning pull-right">edit</a>
        @endif

        @if($discussion->hasBestAnwser())
            <span class="badge">CLOSED</span>
        @else
            <span class="badge">OPEN</span>
        @endif

   </div>

    <div class="panel-body">
    <h4> 
        {{$discussion->title}}
    </h4>
      <p>
        {!! Markdown::convertToHtml(str_limit($discussion->content,300)) !!}
      </p>
    </div>

    <div class="panel-footer">

        @if($discussion->replies->count()>1)
            <span>{{$discussion->replies->count() .' replies'}}</span>
        @else
            <span>{{$discussion->replies->count() .' reply'}}</span>
        @endif
        
        <span class="badge pull-right">{{$discussion->channel->title}}</span>

    </div>
    
</div>
@endforeach

           <div class="text-center">
                {{$discussions->links()}}
           </div>
    
@endsection

