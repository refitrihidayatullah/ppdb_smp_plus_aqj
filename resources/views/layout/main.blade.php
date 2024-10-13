<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} {{ title('app.name') }}. All rights reserved.</p>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
