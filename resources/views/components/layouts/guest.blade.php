<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'KOMINFIK | Komunitas Mahasiswa Informatika Fakultas Ilmu Komputer' }}</title>

    <meta name="description"
        content="{{ $description ?? 'KOMINFIK adalah Komunitas Mahasiswa Informatika Fakultas Ilmu Komputer Universitas Al-Khairiyah Cilegon yang berfokus pada teknologi, kolaborasi, inovasi, dan pengembangan keterampilan digital.' }}">

    <meta name="keywords"
        content="{{ $keywords ?? 'KOMINFIK, Komunitas Mahasiswa Informatika, Informatika, Fakultas Ilmu Komputer, Universitas Al-Khairiyah, Cilegon, komunitas teknologi, mahasiswa IT, coding, web development, inovasi digital' }}">

    <meta name="author" content="Bayu Albar Ladici & Arya Adhi Prasetyo">
    <meta name="robots" content="{{ $robots ?? 'index, follow' }}">
    <meta name="language" content="id">
    <meta name="theme-color" content="#7c3aed">

    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.webp') }}" type="image/x-icon">

    {{-- Open Graph --}}
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:site_name" content="KOMINFIK">
    <meta property="og:title"
        content="{{ $ogTitle ?? ($title ?? 'KOMINFIK | Komunitas Mahasiswa Informatika Fakultas Ilmu Komputer') }}">
    <meta property="og:description"
        content="{{ $ogDescription ?? ($description ?? 'KOMINFIK adalah Komunitas Mahasiswa Informatika Fakultas Ilmu Komputer Universitas Al-Khairiyah Cilegon yang berfokus pada teknologi, kolaborasi, inovasi, dan pengembangan keterampilan digital.') }}">
    <meta property="og:url" content="{{ $ogUrl ?? url()->current() }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('assets/favicon.webp') }}">
    <meta property="og:locale" content="id_ID">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="{{ $twitterCard ?? 'summary_large_image' }}">
    <meta name="twitter:title"
        content="{{ $twitterTitle ?? ($title ?? 'KOMINFIK | Komunitas Mahasiswa Informatika Fakultas Ilmu Komputer') }}">
    <meta name="twitter:description"
        content="{{ $twitterDescription ?? ($description ?? 'KOMINFIK adalah Komunitas Mahasiswa Informatika Fakultas Ilmu Komputer Universitas Al-Khairiyah Cilegon yang berfokus pada teknologi, kolaborasi, inovasi, dan pengembangan keterampilan digital.') }}">
    <meta name="twitter:image" content="{{ $twitterImage ?? asset('assets/favicon.webp') }}">

    {{ $styles ?? '' }}
</head>

<body>
    @include('sweetalert::alert')

    <x-guest.navbar />

    <main>
        {{ $slot }}
    </main>

    <x-guest.footer />

    {{ $scripts ?? '' }}
    <script src="{{ asset('js/fade-in-scroll.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>

</html>
