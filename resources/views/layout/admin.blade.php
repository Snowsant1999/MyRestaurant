<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>window.adminDashboardUrl = "{{ route('adminDashboard') }}";</script>
    @vite('resources/js/app.js')
    <title>My Restaurant</title>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-dark border-bottom border-secondary px-4">
        <div class="container-fluid">
                <div class="navbar-brand fw-bold text-white">Welcome {{ Auth::user()->name }}</div>
            <div class="d-flex align-items-center ms-auto">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-danger fw-bold ms-3">logout</button>
                </form>
            </div>
        </div>
    </nav>
        @yield('content')
</body>
</html>