<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    


    
     <!-- Font Awesome icons (free version)-->
     <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <!-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> -->

        
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
        .active {
            font-weight: bolder;
        }
    </style>
</head>

<body >

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                Bienvenido a obidio-cv-Builder
                </a>
                @endguest

                @auth
                <a class="navbar-brand" href="{{ url('/home') }}">
                obidio-cv-Builder
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class='nav-item'>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
                            Vista previa del CV
                            </button>

                            <!-- Modal -->
                            
                            <div class="modal fade " id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Vista previa del CV</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <iframe width='100%' height='900' src="{{route('resume.index')}}"></iframe>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <!-- <a name="" id="" class="btn btn-primary" href="{{route('resume.uploadPdf')}}" role="button">Guardar</a> -->
                                            <!-- <a name="" id="" class="btn btn-primary" href="{{route('resume.download')}}" role="button">Descargar</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                         
                           
                        </li>
                                             
                       
                        


                        <!-- <div class="nav-item">
                            <a target="_blank" href=" {{route('resume.index')}} "> View</a>
                        </div> -->
                        @endauth



                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Inicia sesión ') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Session') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4 container">
       

            @auth
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item {{ request()->is('user-detail') ? 'active' : '' }}"><a href="{{route('user-detail.index')}}">Acerca de mi</a></li>
                    <li class="breadcrumb-item {{ request()->is('education') ? 'active' : '' }}"><a href="{{route('education.index')}}">Educación</a></li>
                    <li class="breadcrumb-item {{ request()->is('experience') ? 'active' : '' }}"><a href="{{route('experience.index')}}">Experiencia</a></li>
                    <li class="breadcrumb-item {{ request()->is('skill') ? 'active' : '' }}"><a href="{{route('skill.index')}}">Skills</a></li>

                </ol>
            </nav>
            @endauth

            {{-- validation error section --}}
            <div>
                @if(session()->has('errors'))
                <ol class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $e)

                    <li>{{$e}}</li>

                    @endforeach
                </ol>
                @endif
            </div>

            @yield('content')
        </main>
    </div>
</body>

</html>