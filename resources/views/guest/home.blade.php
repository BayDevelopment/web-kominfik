@extends('layouts.guest')

@section('content')
    <section class="hero" id="beranda">
        <div class="container hero-grid">
            <div>
                <div class="hero-badge">
                    ✨ Organisasi Mahasiswa • Kreatif • Inovatif • Kolaboratif
                </div>

                <h1 class="hero-title">
                    Wadah Berkembang dan Berkarya untuk
                    <span>Mahasiswa Informatika</span>
                </h1>

                <p class="hero-desc">
                    KOMINFIK adalah Komunitas Mahasiswa Informatika Fakultas Ilmu Komputer
                    yang menjadi ruang kolaborasi, pengembangan skill, kepemimpinan, serta
                    inovasi digital untuk generasi mahasiswa yang adaptif dan visioner.
                </p>

                <div class="hero-buttons">
                    <a href="#tentang" class="btn btn-primary">Eksplor KOMINFIK</a>
                    <a href="#program" class="btn btn-outline">Lihat Program Kami</a>
                </div>

                <div class="hero-stats">
                    <div class="stat-card">
                        <h3>150+</h3>
                        <p>Mahasiswa aktif dan kolaboratif</p>
                    </div>
                    <div class="stat-card">
                        <h3>12+</h3>
                        <p>Program kerja dan kegiatan rutin</p>
                    </div>
                    <div class="stat-card">
                        <h3>25+</h3>
                        <p>Project, seminar, dan workshop</p>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="glass-card hero-panel">
                    <div class="panel-top">
                        <h3 style="font-size: 1.4rem;">Ekosistem KOMINFIK</h3>
                        <span class="panel-chip">Modern Community</span>
                    </div>

                    <div class="panel-grid">
                        <div class="mini-box">
                            <h4>💻 Tech Development</h4>
                            <p>Mendorong kemampuan coding, UI/UX, web development, dan problem solving.</p>
                        </div>
                        <div class="mini-box">
                            <h4>🚀 Leadership</h4>
                            <p>Menumbuhkan jiwa kepemimpinan, tanggung jawab, dan komunikasi organisasi.</p>
                        </div>
                        <div class="mini-box">
                            <h4>🤝 Collaboration</h4>
                            <p>Menghubungkan mahasiswa melalui teamwork, diskusi, dan project bersama.</p>
                        </div>
                        <div class="mini-box">
                            <h4>🌐 Innovation</h4>
                            <p>Membangun budaya inovatif untuk menghadapi tantangan teknologi masa depan.</p>
                        </div>
                    </div>

                    <div style="margin-top: 20px; position: relative; z-index: 1;">
                        <div class="mini-box">
                            <h4>Visi KOMINFIK</h4>
                            <p>
                                Menjadi komunitas mahasiswa informatika yang inspiratif, unggul,
                                dan berdampak bagi lingkungan akademik maupun masyarakat digital.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang">
        <div class="container">
            <div class="section-header">
                <span class="tag">Tentang KOMINFIK</span>
                <h2>Komunitas yang Elegan, Aktif, dan Berorientasi Masa Depan</h2>
                <p>
                    KOMINFIK hadir untuk memperkuat kapasitas mahasiswa informatika melalui
                    lingkungan yang suportif, modern, dan penuh semangat belajar bersama.
                </p>
            </div>

            <div class="about-grid">
                <div class="info-card">
                    <div class="icon">🎯</div>
                    <h3>Visi yang Jelas</h3>
                    <p>
                        Menjadi pusat pengembangan mahasiswa informatika yang unggul dalam akademik,
                        organisasi, serta inovasi teknologi.
                    </p>
                </div>

                <div class="info-card">
                    <div class="icon">📚</div>
                    <h3>Pembelajaran Berkualitas</h3>
                    <p>
                        Menghadirkan workshop, sharing session, mentoring, dan kelas pengembangan
                        skill yang relevan dengan dunia digital saat ini.
                    </p>
                </div>

                <div class="info-card">
                    <div class="icon">🏆</div>
                    <h3>Budaya Prestasi</h3>
                    <p>
                        Mendorong anggota untuk aktif berkompetisi, berinovasi, dan menciptakan
                        dampak positif di tingkat kampus maupun luar kampus.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="program">
        <div class="container">
            <div class="section-header">
                <span class="tag">Program Unggulan</span>
                <h2>Aktivitas Modern yang Relevan untuk Mahasiswa Informatika</h2>
                <p>
                    Setiap program dirancang agar anggota tidak hanya aktif berorganisasi,
                    tetapi juga berkembang secara teknis, sosial, dan profesional.
                </p>
            </div>

            <div class="program-grid">
                <div class="info-card">
                    <div class="icon">🧠</div>
                    <h3>Tech Class</h3>
                    <p>
                        Kelas intensif seputar web development, mobile app, data science,
                        cloud, dan teknologi terkini.
                    </p>
                </div>

                <div class="info-card">
                    <div class="icon">🎤</div>
                    <h3>Seminar & Talkshow</h3>
                    <p>
                        Menghadirkan pembicara inspiratif dari akademisi maupun praktisi
                        industri teknologi.
                    </p>
                </div>

                <div class="info-card">
                    <div class="icon">🛠️</div>
                    <h3>Project Collaboration</h3>
                    <p>
                        Mengembangkan mini project, lomba, dan karya digital bersama untuk
                        membangun portofolio mahasiswa.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="anggota">
        <div class="container">
            <div class="section-header">
                <span class="tag">Anggota KOMINFIK</span>
                <h2>Tim Mahasiswa yang Aktif, Profesional, dan Visioner</h2>
                <p>
                    Berikut contoh tampilan card anggota dengan auto scroll vertikal yang modern,
                    elegan, dan nyaman dilihat pada berbagai ukuran perangkat.
                </p>
            </div>

            <div class="member-section-wrap">
                <div class="member-info">
                    <h3>Bergabung Bersama KOMINFIK</h3>
                    <p>
                        Jadilah bagian dari komunitas mahasiswa informatika yang aktif membangun
                        relasi, meningkatkan kemampuan, dan menciptakan kontribusi nyata.
                    </p>

                    <div class="member-points">
                        <div>✅ Lingkungan belajar yang suportif dan kolaboratif</div>
                        <div>✅ Program kerja dan kelas pengembangan skill</div>
                        <div>✅ Relasi antar mahasiswa dan pengalaman organisasi</div>
                        <div>✅ Kesempatan membangun portofolio dan leadership</div>
                    </div>

                    <div style="margin-top: 24px;">
                        <a href="#kontak" class="btn btn-primary">Daftar Menjadi Anggota</a>
                    </div>
                </div>

                <div class="member-scroll-box">
                    <div class="member-scroll">

                        <a href="{{ route('member.detail', 'ahmad-rizky') }}" class="member-card">
                            <div class="avatar">AR</div>
                            <div class="member-body">
                                <div class="member-top">
                                    <h4>Ahmad Rizky</h4>
                                    <span class="member-badge">Inti</span>
                                </div>
                                <span class="member-role">Ketua Umum</span>
                                <p>
                                    Memimpin arah komunitas, merancang strategi organisasi, serta
                                    mengoordinasikan seluruh program kerja utama KOMINFIK secara menyeluruh.
                                </p>
                                <div class="member-meta">
                                    <span>Divisi Inti</span>
                                    <span>Angkatan 2022</span>
                                    <span>Leadership</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('member.detail', 'nadia-safitri') }}" class="member-card">
                            <div class="avatar">NS</div>
                            <div class="member-body">
                                <div class="member-top">
                                    <h4>Nadia Safitri</h4>
                                    <span class="member-badge">Inti</span>
                                </div>
                                <span class="member-role">Wakil Ketua</span>
                                <p>
                                    Mendukung ketua dalam pelaksanaan program, memastikan koordinasi antar divisi,
                                    dan menjaga ritme kerja organisasi tetap efektif.
                                </p>
                                <div class="member-meta">
                                    <span>Divisi Inti</span>
                                    <span>Angkatan 2022</span>
                                    <span>Manajemen Tim</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('member.detail', 'fajar-ananta') }}" class="member-card">
                            <div class="avatar">FA</div>
                            <div class="member-body">
                                <div class="member-top">
                                    <h4>Fajar Ananta</h4>
                                    <span class="member-badge">Inti</span>
                                </div>
                                <span class="member-role">Sekretaris</span>
                                <p>
                                    Mengelola administrasi, menyusun dokumentasi kegiatan, membuat notulensi rapat,
                                    dan memastikan arsip organisasi tersimpan dengan baik.
                                </p>
                                <div class="member-meta">
                                    <span>Administrasi</span>
                                    <span>Angkatan 2023</span>
                                    <span>Dokumentasi</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('member.detail', 'dinda-lestari') }}" class="member-card">
                            <div class="avatar">DL</div>
                            <div class="member-body">
                                <div class="member-top">
                                    <h4>Dinda Lestari</h4>
                                    <span class="member-badge">Inti</span>
                                </div>
                                <span class="member-role">Bendahara</span>
                                <p>
                                    Bertanggung jawab atas pengelolaan keuangan organisasi, penyusunan laporan,
                                    serta memastikan transparansi dan efisiensi penggunaan anggaran.
                                </p>
                                <div class="member-meta">
                                    <span>Keuangan</span>
                                    <span>Angkatan 2023</span>
                                    <span>Administrasi</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('member.detail', 'raka-pratama') }}" class="member-card">
                            <div class="avatar">RP</div>
                            <div class="member-body">
                                <div class="member-top">
                                    <h4>Raka Pratama</h4>
                                    <span class="member-badge">Koordinator</span>
                                </div>
                                <span class="member-role">Koordinator Akademik</span>
                                <p>
                                    Menginisiasi kelas belajar, mentoring, diskusi teknis, dan kegiatan akademik
                                    yang mendukung peningkatan kompetensi mahasiswa informatika.
                                </p>
                                <div class="member-meta">
                                    <span>Akademik</span>
                                    <span>Angkatan 2022</span>
                                    <span>Mentoring</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('member.detail', 'intan-maharani') }}" class="member-card">
                            <div class="avatar">IM</div>
                            <div class="member-body">
                                <div class="member-top">
                                    <h4>Intan Maharani</h4>
                                    <span class="member-badge">Koordinator</span>
                                </div>
                                <span class="member-role">Koordinator Media</span>
                                <p>
                                    Mengelola identitas digital komunitas, publikasi media sosial,
                                    dokumentasi konten, dan strategi komunikasi visual KOMINFIK.
                                </p>
                                <div class="member-meta">
                                    <span>Media</span>
                                    <span>Angkatan 2023</span>
                                    <span>Branding</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('member.detail', 'bayu-prasetyo') }}" class="member-card">
                            <div class="avatar">BY</div>
                            <div class="member-body">
                                <div class="member-top">
                                    <h4>Bayu Prasetyo</h4>
                                    <span class="member-badge">Koordinator</span>
                                </div>
                                <span class="member-role">Koordinator Event</span>
                                <p>
                                    Menyusun konsep kegiatan, mengatur timeline acara, dan memastikan seminar,
                                    workshop, maupun event berjalan dengan baik dan terstruktur.
                                </p>
                                <div class="member-meta">
                                    <span>Event Organizer</span>
                                    <span>Angkatan 2022</span>
                                    <span>Public Speaking</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('member.detail', 'salsa-amelia') }}" class="member-card">
                            <div class="avatar">SA</div>
                            <div class="member-body">
                                <div class="member-top">
                                    <h4>Salsa Amelia</h4>
                                    <span class="member-badge">Divisi</span>
                                </div>
                                <span class="member-role">UI/UX Division</span>
                                <p>
                                    Fokus pada desain antarmuka, pengalaman pengguna, dan pengembangan tampilan
                                    visual yang modern untuk kebutuhan project komunitas.
                                </p>
                                <div class="member-meta">
                                    <span>UI/UX</span>
                                    <span>Angkatan 2024</span>
                                    <span>Product Design</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('member.detail', 'muhammad-fikri') }}" class="member-card">
                            <div class="avatar">MF</div>
                            <div class="member-body">
                                <div class="member-top">
                                    <h4>Muhammad Fikri</h4>
                                    <span class="member-badge">Divisi</span>
                                </div>
                                <span class="member-role">Web Developer</span>
                                <p>
                                    Mengembangkan website, fitur internal, dan sistem digital untuk mendukung
                                    kebutuhan organisasi serta pengembangan project komunitas.
                                </p>
                                <div class="member-meta">
                                    <span>Development</span>
                                    <span>Angkatan 2023</span>
                                    <span>Laravel</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('member.detail', 'laila-azzahra') }}" class="member-card">
                            <div class="avatar">LA</div>
                            <div class="member-body">
                                <div class="member-top">
                                    <h4>Laila Azzahra</h4>
                                    <span class="member-badge">Divisi</span>
                                </div>
                                <span class="member-role">Public Relation</span>
                                <p>
                                    Membangun relasi eksternal, menjalin komunikasi dengan pihak kampus maupun mitra,
                                    dan memperkuat citra positif organisasi di publik.
                                </p>
                                <div class="member-meta">
                                    <span>Humas</span>
                                    <span>Angkatan 2024</span>
                                    <span>Communication</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('member.detail', 'dio-valencia') }}" class="member-card">
                            <div class="avatar">DV</div>
                            <div class="member-body">
                                <div class="member-top">
                                    <h4>Dio Valencia</h4>
                                    <span class="member-badge">Divisi</span>
                                </div>
                                <span class="member-role">Creative Team</span>
                                <p>
                                    Menciptakan materi visual, konten promosi, desain publikasi, dan kebutuhan
                                    kreatif untuk mendukung kegiatan serta branding KOMINFIK.
                                </p>
                                <div class="member-meta">
                                    <span>Creative</span>
                                    <span>Angkatan 2023</span>
                                    <span>Graphic Design</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('member.detail', 'citra-ramadhani') }}" class="member-card">
                            <div class="avatar">CR</div>
                            <div class="member-body">
                                <div class="member-top">
                                    <h4>Citra Ramadhani</h4>
                                    <span class="member-badge">Aktif</span>
                                </div>
                                <span class="member-role">Member Active</span>
                                <p>
                                    Aktif berpartisipasi dalam kegiatan komunitas, project internal, dan program
                                    pengembangan kompetensi untuk mendukung pertumbuhan organisasi.
                                </p>
                                <div class="member-meta">
                                    <span>Member</span>
                                    <span>Angkatan 2024</span>
                                    <span>Tech Enthusiast</span>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta" id="kontak">
        <div class="container">
            <div class="cta-box">
                <h2>Siap Menjadi Bagian dari KOMINFIK?</h2>
                <p>
                    Mari tumbuh bersama dalam komunitas yang modern, elegan, dan berorientasi
                    pada pengembangan potensi mahasiswa informatika Fakultas Ilmu Komputer.
                </p>
                <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
                    <a href="#" class="btn btn-primary">Daftar Sekarang</a>
                    <a href="#" class="btn btn-outline">Hubungi Pengurus</a>
                </div>
            </div>
        </div>
    </section>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scrollBox = document.querySelector('.member-scroll');

            if (scrollBox) {
                let direction = 1;
                let speed = 1;
                let pause = false;

                scrollBox.addEventListener('mouseenter', () => pause = true);
                scrollBox.addEventListener('mouseleave', () => pause = false);

                function autoScroll() {
                    if (!pause) {
                        scrollBox.scrollTop += speed * direction;

                        const maxScroll = scrollBox.scrollHeight - scrollBox.clientHeight;

                        if (scrollBox.scrollTop >= maxScroll) {
                            direction = -1;
                        }

                        if (scrollBox.scrollTop <= 0) {
                            direction = 1;
                        }
                    }

                    requestAnimationFrame(autoScroll);
                }

                autoScroll();
            }
        });
    </script>
@endsection
