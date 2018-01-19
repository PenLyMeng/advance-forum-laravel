@extends('layouts.app')

@section('content')

        @if( $discussions->count()==0)
             <div class="panel panel-success">
                <div class="panel-heading">
                    {{$channel}}
                </div>

                <div class="panel-body">
                   <h3 class="text-center">No discussion available!</h1>
                </div>
             </div>
        @else
                   
           <div class="panel panel-success">
                <div class="panel-heading">
                    {{$channel}}
                </div>

                <div class="panel-body">

                @foreach($discussions as $discussion)
         
                @if($discussion->hasBestAnwser())
                    <div class="panel panel-danger">
                @else   
                    <div class="panel panel-info">
                @endif
                    <div class="panel-heading">
                        <img src="{{asset($discussion->user->avatar)}}" alt="{{$discussion->user->avatar}}" width="32px" height="32px">&nbsp;
                        <span>{{$discussion->user->name}}({{$discussion->user->points}}) <b>{{$discussion->created_at->diffForHumans()}}</b></span>

                        <a href="{{route('discussion',['slug' => $discussion->slug])}}" class="btn btn-xs btn-default pull-right">view</a>
                        
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
                        {{str_limit($discussion->content,100)}}
                      </p>
                    </div>

                    <div class="panel-footer">
                
                        @if($discussion->replies->count()>1)
                            <p>{{$discussion->replies->count() .' replies'}}</p>
                        @else
                            <p>{{$discussion->replies->count() .' reply'}}</p>
                        @endif

                    </div>
                </div>

                @endforeach
                
                </div>
             </div>

              
             <div class="text-center">
                {{$discussions->links()}}
            </div>
 
           @endif



@endsection

