<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'KOMINFIK | Komunitas Mahasiswa Informatika Fakultas Ilmu Komputer' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.webp') }}" type="image/x-icon">
    {{ $styles ?? '' }}
</head>

<body>
    @include('sweetalert::alert')

    <x-guest.navbar />

    <main>
        {{$slot}}
    </main>

    <x-guest.footer />

    {{ $scripts ?? '' }}
</body>

</html>