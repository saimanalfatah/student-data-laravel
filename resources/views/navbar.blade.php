<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="{{ url('/') }}">SiswakuApp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        {{-- Siswa --}}
        @if (!empty($halaman) && $halaman == 'siswa')
            <a class="nav-item nav-link active" href="{{ url('siswa') }} ">Siswa<span class="sr-only">(current)</span></a>
        @else 
            <a class="nav-item nav-link" href="{{ url('siswa') }} ">Siswa</a>
        @endif
        {{-- Kelas --}}
        @if (Auth::check())
            @if (!empty($halaman) && $halaman == 'kelas')
                <a class="nav-item nav-link active" href="{{ url('kelas') }} ">Kelas<span class="sr-only">(current)</span></a>
            @else 
                <a class="nav-item nav-link" href="{{ url('kelas') }} ">Kelas</a>
            @endif
        @endif
        {{-- Hobi --}}
        @if (Auth::check())
            @if (!empty($halaman) && $halaman == 'hobi')
                <a class="nav-item nav-link active" href="{{ url('hobi') }} ">Hobi<span class="sr-only">(current)</span></a>
            @else 
                <a class="nav-item nav-link" href="{{ url('hobi') }} ">Hobi</a>
            @endif
        @endif
        {{-- About --}}
        @if (!empty($halaman) && $halaman == 'about')
            <a class="nav-item nav-link active" href="{{ url('about') }}">About<span class="sr-only">(current)</span></a>
        @else
            <a class="nav-item nav-link" href="{{ url('about') }}">About</a>
        @endif
        {{-- User --}}
        @if (Auth::check() && Auth::user()->level == 'admin')
            @if (!empty($halaman) && $halaman == 'user')
                <a class="nav-item nav-link active" href="{{ url('user') }}">User<span class="sr-only">(current)</span></a>
            @else
                <a class="nav-item nav-link" href="{{ url('user') }}">User</a>
            @endif
        @endif

    </div>
    <div class="navbar-nav ml-auto">
        @if (Auth::check())
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf 
                    </form>
                </div>
            </div>
        @else 
            <a class="nav-item nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        @endif
    </div>
  </div>
</div>
</nav>