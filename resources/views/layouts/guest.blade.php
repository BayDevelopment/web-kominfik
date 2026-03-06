<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'KOMINFIK | Komunitas Mahasiswa Informatika Fakultas Ilmu Komputer' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>

<body>
    @include('partials.guest.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.guest.footer')
    @stack('scripts')
</body>

</html>
