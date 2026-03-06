<nav class="navbar" id="navbar">
    <div class="container navbar-inner">
        <a href="{{ route('home') }}" class="brand">
            <div class="brand-logo">
                <span>K</span>
            </div>

            <div class="brand-text">
                <div class="brand-title">KOMINFIK</div>
                <small class="brand-sub">Komunitas Mahasiswa Informatika</small>
            </div>
        </a>

        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation" type="button">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="nav-menu-wrap" id="navMenuWrap">
            <div class="nav-menu">
                <a href="{{ route('home') }}#beranda" class="nav-link">Beranda</a>
                <a href="{{ route('home') }}#tentang" class="nav-link">Tentang</a>
                <a href="{{ route('home') }}#program" class="nav-link">Program</a>
                <a href="{{ route('home') }}#anggota" class="nav-link">Anggota</a>
                <a href="{{ route('home') }}#kontak" class="nav-link">Kontak</a>
            </div>

            <div class="nav-cta">
                <a href="#kontak" class="nav-btn">Gabung Sekarang</a>
            </div>
        </div>
    </div>
</nav>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navToggle = document.getElementById('navToggle');
            const navMenuWrap = document.getElementById('navMenuWrap');
            const navbar = document.getElementById('navbar');
            const navLinks = document.querySelectorAll('.nav-link');

            if (navToggle && navMenuWrap) {
                navToggle.addEventListener('click', function() {
                    navToggle.classList.toggle('active');
                    navMenuWrap.classList.toggle('active');
                });
            }

            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    navToggle.classList.remove('active');
                    navMenuWrap.classList.remove('active');
                });
            });

            window.addEventListener('scroll', function() {
                if (window.scrollY > 20) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
    </script>
@endpush
