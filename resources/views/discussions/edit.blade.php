@extends('layouts.app')

@section('content')
 
            <div class="panel panel-default">
                <div class="panel-heading text-center">Update a discussion</div>

                <div class="panel-body">

                    <form action="{{route('discussions.update',['id' => $discussion->id])}}" method="POST"> 
                        {{csrf_field()}}
                    
                       <div class="form-group">
                            <label for="content">Discussion Content</label>
                            <textarea name="content" id="content"  cols="30" rows="10" class="form-control">{{$discussion->content}}</textarea>
                       </div>
                       
                       <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Update</button>
                       </div>
                        
                     </form>

                        
                </div>
            </div>
    
@endsection
