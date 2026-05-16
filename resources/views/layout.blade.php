<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">School Management</a>
            <div class="navbar-nav me-auto">
                @if(session('token'))
                    <a class="nav-link" href="{{ route('teachers.index') }}">Teachers</a>
                    <a class="nav-link" href="{{ route('students.index') }}">Students</a>
                    <a class="nav-link" href="{{ route('subjects.index') }}">Subjects</a>
                @endif
            </div>
            <div class="navbar-nav ms-auto">
                @if(session('token'))
                    <span class="nav-link text-light">{{ session('user')['name'] }}</span>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline">
                        @csrf
                        <button class="btn btn-outline-light btn-sm mt-1">Sortir</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Registre</a>
                @endif
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>