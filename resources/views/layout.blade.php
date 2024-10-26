<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web 2 Content Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Konten Management</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.index') }}">All Posts</a>
                        </li>
                        <!-- pertemuan 4 -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('transaksi.index') }}">All Transaction</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        
                        @if(session()->has('user'))
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link nav-link">Logout</button>
                                </form>
                            </li>

                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('lang', 'en') }}" class="btn btn-primary">English</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lang', 'id') }}" class="btn btn-danger">Bahasa Indonesia</a>
                        <li class="nav-item">
                    </ul>
                </div>
            </div>
        </nav>
        <div class="py-4">
        @yield('content')
    </div>
</body>
</html>