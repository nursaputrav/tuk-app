<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Tuk') }}</title>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/my.js') }}" defer></script>
        <script src="{{ asset('js/feather.min.js') }}"></script>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/my.css') }}" rel="stylesheet">
    </head>
    <body>


    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white px-4 py-2 px-lg-5 py-lg-3">
        <div class="container-fluid ">
          <a class="navbar-brand">
            <img src="/image/brand/tuk.png" width="100">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto text-center mb-2 mb-lg-0">
                @auth
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link {{ Request::is('project*') ? 'active' : '' }}" href="{{ route('project.index') }}">Project</a>
                </li>
                <li class="nav-item ms-1">
                    <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="{{ route('profile.view') }}">Profile</a>
                </li>
                <li class="nav-item ms-1">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                        @csrf
                    </form>
                </li>
                @if(Auth::user()->level == 'admin')
                <li class="nav-item ms-1">
                    <a class="nav-link {{ Request::is('sekolah*') ? 'active' : '' }}" href="{{ route('sekolah.index') }}">Sekolah</a>
                </li>
                <li class="nav-item ms-1">
                    <a class="nav-link {{ Request::is('kelas*') ? 'active' : '' }}" href="{{ route('kelas.index') }}">Kelas</a>
                </li>

                <li class="nav-item ms-1">
                    <a class="nav-link {{ Request::is('program-keahlian*') ? 'active' : '' }}" href="{{ route('program-keahlian.index') }}">Program</a>
                </li>
                <li class="nav-item ms-1">
                    <a class="nav-link {{ Request::is('skema*') ? 'active' : '' }}" href="{{ route('skema.index') }}">Skema</a>
                </li>
                @endif
                @endauth
            </ul>

            <form class="d-flex mt-5 mt-sm-5 mt-md-5 mt-lg-0 mt-xl-0 mt-xxl-0">
               <a class="navbar-brand ms-auto">
                    <img src="/image/brand/bnsp.png" width="100">
               </a>
               <a class="navbar-brand me-auto">
                    <img src="/image/brand/lsp.png" width="100">
               </a>
            </form>

          </div>
        </div>
    </nav>
    <div>
        @include('alert')
        @yield('content')
    </div>
        <script>
            feather.replace()
        </script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
    </body>
</html>
