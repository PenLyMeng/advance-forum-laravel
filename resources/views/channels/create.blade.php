@extends('layouts.app')

@section('content')
 
            <div class="panel panel-default">
                <div class="panel-heading">Channel</div>

                <div class="panel-body">
                    <form action="{{route('channels.store')}}" method="POST">
                        {{csrf_field()}}

                       <div class="form-group">
                            <input type="text" name="channel" class="form-control">
                       </div>

                       <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">
                                Save Channel
                            </button>
                       </div>
                       
                       
                    </form>
                </div>
            </div>
     
@endsection
