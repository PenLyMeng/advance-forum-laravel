@extends('layouts.app')

@section('content')
 
            <div class="panel panel-default">
                <div class="panel-heading text-center">Create a new discussion</div>

                <div class="panel-body">

                    <form action="{{route('discussions.store')}}" method="POST"> 
                        {{csrf_field()}}
                       
                       <label for="channel_id">Pick a channel</label>
                       <div class="form-group">
                           <select name="channel_id" id="channel_id" class="form-control">
                               @foreach($channels as $channel)
                                 <option value="{{$channel->id}}">{{$channel->title}}</option>
                               @endforeach
                           </select>                         
                       </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control">
                </div>

              
                       <div class="form-group">
                       <label for="content"></label>
                        <textarea name="content" id="content"  cols="30" rows="10" class="form-control">{{old('content')}}</textarea>
                       </div>
                       
                       <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Create</button>
                       </div>
                        
                     </form>

                        
                </div>
            </div>
    
@endsection
