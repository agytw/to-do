<header class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="#">To-Do List</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#todonavbars" aria-controls="todonavbars" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="todonavbars">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            @auth ()
                <li class="nav-item">
                    <a class="nav-link" href="/create">Add Things To-Do</a>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown">Sort By:</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/">Deadlines</a>
                        <a class="dropdown-item" href="/priority">Priorities</a>
                    </div>
                </li>
            @endauth
        </ul>

        <ul class="navbar-nav">
            <!-- Authentication Links -->
            @guest
                <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
            @else
                <li class="dropdown nav-item">
                    <a href="#" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endguest
        </ul>

    </div>
</header>
