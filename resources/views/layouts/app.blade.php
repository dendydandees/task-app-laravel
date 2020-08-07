<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    @livewireStyles
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="bg-dark text-warning">
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-warning bg-gradient shadow ">
      <div class="container">
        <a class="navbar-brand font-weight-bold" href="{{ url('/tasks') }}">
          {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" style="border: 0px">
          <svg class="menu" width="32" height="32" viewBox="0 0 43 23" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line y1="1.5" x2="43" y2="1.5" stroke="white" stroke-width="4" />
            <line y1="11.5" x2="28" y2="11.5" stroke="white" stroke-width="4" />
            <line y1="21.5" x2="16" y2="21.5" stroke="white" stroke-width="4" />
          </svg>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
              <li class="nav-item">
                <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Sign In') }}</a>
              </li>
              @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                </li>
              @endif
            @else
              <li class="nav-item dropdown dropleft">
                <a id="navbarDropdown" class="nav-link py-0 px-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  @if (Auth::user()->avatar == null)
                      <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&rounded=true&size=32&background=343a40&color=ffc107&length=1" alt="users photos">
                  @else
                      <img src="{{asset('images/'.Auth::user()->avatar)}}" alt="profile photos" width="40" height="40" class="rounded-circle">
                  @endif
                </a>

                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown" style="min-width: 300px;">
                  <div class="dropdown-item disabled d-flex justify-content-start align-items-start text-warning">
                    @if (Auth::user()->avatar == null)
                      <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&rounded=true&size=32&background=343a40&color=ffc107&length=1" alt="users photos">
                    @else
                        <img src="{{asset('images/'.Auth::user()->avatar)}}" alt="profile photos" width="40" height="40" class="rounded-circle">
                    @endif
                    <div class="d-flex flex-column px-2">
                      <h5 class="m-0">{{ Auth::user()->name }}</h5>
                      <p class="m-0">{{ Auth::user()->email }}</p>
                    </div>
                  </div>
                  <div class="dropdown-divider border-warning"></div>
                  <a href="{{ route('profile.edit', Auth::user()->id) }}" class="dropdown-item py-2 text-warning">
                  <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-gear mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
                    <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
                  </svg>
                  <span>Manage Account</span>
                  </a>
                  <a class="dropdown-item py-2 text-warning" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      <svg class="bi bi-box-arrow-in-right mr-3" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8.146 11.354a.5.5 0 0 1 0-.708L10.793 8 8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 1 8z"/>
                        <path fill-rule="evenodd" d="M13.5 14.5A1.5 1.5 0 0 0 15 13V3a1.5 1.5 0 0 0-1.5-1.5h-8A1.5 1.5 0 0 0 4 3v1.5a.5.5 0 0 0 1 0V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5h-8A.5.5 0 0 1 5 13v-1.5a.5.5 0 0 0-1 0V13a1.5 1.5 0 0 0 1.5 1.5h8z"/>
                      </svg>
                      <span>{{ __('Logout') }}</span>
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

    <main class="py-4">
        @yield('content')
    </main>
  </div>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })

      bsCustomFileInput.init()
    </script>
    @livewireScripts
</body>
</html>
