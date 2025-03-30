<nav class="navbar navbar-expand-lg mb-3" style="padding-left: 24px; padding-right: 24px;">
    <a class="navbar-brand" href="/">CardiNote</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item {{ Route::currentRouteName() == 'mainView' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('mainView') }}">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'logView' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('logView') }}">Logs</a>
            </li>
        </ul>
        
        <div class="d-flex gap-3">
            <div class="d-none d-lg-flex align-items-center gap-1 welcomeMessage">
                Welcome,
                <div style="font-weight: bold;">
                    {{ Auth::user()->name }}!
                </div>
            </div>
            <form action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>

<style scoped>
    .navbar {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
    }

    .navbar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-brand {
        font-size: 1.5rem;
        font-weight: 700;
        color: #343a40;
    }

    .nav-link {
        font-weight: 500;
        color: grey;
        text-decoration: none;
    }

    .nav-item :hover {
        color: #2b3037;
    }

    .nav-item.active .nav-link {
        color: black;
    }
</style>