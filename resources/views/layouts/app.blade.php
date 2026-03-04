<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Game-Shop')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css", rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar bg-primary">
        <div class="container">
            <a class="navbar-brand text-light" href="/">Game Shop</a>
            <a class="nav-link active text-light" aria-current="page" href="/about">About</a>
        </div>
    </nav>
    <main class="flex-grow-1 container">
        @yield('content')
    </main>
    <footer class="text-center border-top bottom">
        <p>&copy; 2026 Всі права захищені | Сапальов В.С</p>
    </footer>
</body>
</html>