@extends('layouts.app')

@section('content')
 
            <div class="panel panel-default">
                <div class="panel-heading">Channel</div>

                <div class="panel-body">
                    <form action="{{route('channels.update',['channel' => $channel->id])}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}

                       <div class="form-group">
                            <input type="text" value="{{$channel->title}}" name="channel" class="form-control">
                       </div>

                       <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">
                                Update Channel
                            </button>
                       </div>
                       
                       
                    </form>
                </div>
            </div>
    
@endsection
