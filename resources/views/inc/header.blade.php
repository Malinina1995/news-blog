<nav class="navbar navbar-light header" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="/">BadlyNews</a>
        <div style="display: flex; flex-direction: row">
            @if(Auth::user() && Auth::user()->can('add-news'))
                <a class="btn btn-outline-primary" role="button" href="{{ route('add') }}">Добавить новость</a>
            @endif

            @guest

                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif

            @else
                <a href="{{ route('logout') }}" class="nav-link"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }} ({{ Auth::user()->name }})
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            @endguest
        </div>
    </div>
</nav>
