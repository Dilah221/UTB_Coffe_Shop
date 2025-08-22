<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTB Coffee Shop</title>
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
        <a class="navbar-brand" href="/">UTB Coffee Shop</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-link text-light">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endauth
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>

</html>
