<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'Advance Forum') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/highlightjs.min.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Advance Forum') }}
                    </a>
                </div>


             

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">

        
            <div class="col col-sm-4">

                <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="list-group">

                                <div class="list-group-item">
                                    <a href="{{route('forum')}}" style="text-decoration:none">Home</a>
                                </div>
                                
                                @if(Auth::check())
                                <div class="list-group-item">
                                    <a href="/forum?filter=me" style="text-decoration:none">My Discussion</a>
                                </div>
                                @endif
                                
                                <div class="list-group-item">
                                        <a href="/forum?filter=solved" style="text-decoration:none">Anwsered Discussion</a>
                                </div>

                                <div class="list-group-item">
                                        <a href="/forum?filter=unsolved" style="text-decoration:none">Opened Discussion</a>
                                </div>

                                    
                            </div>
                        </div>

                </div>

            <a href="{{route('discussions.create')}}" class="form-control btn btn-primary">
                Create a new discussion
            </a>
            <br/><br/>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Channels</span> <a href="{{route('channels.index')}}" class="btn btn-default btn-xs pull-right">View all channel</a>
                    </div>
 

                    <div class="panel-body">
                        
                    <ul class="list-group">
                        @foreach($channels as $channel)
                            <li class="list-group-item">
                               <a href="{{route('channel',['slug' =>  $channel->slug])}}" style="text-decoration:none"> {{$channel->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                    
                    </div>
                
                </div>
            </div>

            <div class="col col-sm-8">
 

               @if($errors->count()>0)
               <ul class="list-group-item">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item text-danger">{{$error}}</li>
                    @endforeach
                </ul>
                <hr/>
                

               @endif

                @yield('content')
            </div>
        

        </div>



    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/highlightjs.min.js') }}"></script>
   

    <script>
         @if(Session::has('success'))
            toastr.success('{{Session::get('success')}}');
         @endif
    </script>

    <script>
        hljs.initHighlightingOnLoad();
   </script>
</body>
</html>
