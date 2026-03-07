<x-layouts.guest>
    <section class="hero" id="beranda">
        <div class="container hero-grid">
            <div>
                <div class="hero-badge">
                    ✨ Organisasi Mahasiswa • Kreatif • Inovatif • Kolaboratif
                </div>

                <h1 class="hero-title">
                    {{ $hero_section->title ?? 'No Title' }}
                </h1>

                <p class="hero-desc">
                    {{ $hero_section->sub_title ?? 'No Subtitle' }}
                </p>

                <div class="hero-buttons">
                    <a href="#tentang" class="btn btn-primary">Eksplor KOMINFIK</a>
                    <a href="#program" class="btn btn-outline">Lihat Program Kami</a>
                </div>

                <div class="hero-stats">
                    <div class="stat-card">
                        <h3>{{ $members_count }}+</h3>
                        <p>Mahasiswa aktif dan kolaboratif</p>
                    </div>
                    <div class="stat-card">
                        <h3>{{ $hero_section->total_activity ?? 0 }}+</h3>
                        <p>Program kerja dan kegiatan rutin</p>
                    </div>
                    <div class="stat-card">
                        <h3>{{ $hero_section->total_event ?? 0 }}+</h3>
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
                                {{ $hero_section->vision ?? 'No Vision' }}
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
                        <a href="{{ route('member.registration') }}" class="btn btn-primary">Daftar Menjadi Anggota</a>
                    </div>
                </div>

                <div class="member-scroll-box">
                    <div class="member-scroll">
                        @foreach ($members as $member)
                            @php
                                $initials = implode('', array_map(fn ($w) => strtoupper($w[0]), explode(' ', $member->name)));
                            @endphp
                            <a href="{{ route('member.detail', ['id' => $member->id]) }}" class="member-card">
                                <div class="avatar">{{ $initials }}</div>
                                <div class="member-body">
                                    <div class="member-top">
                                        <h4>{{ $member->name }}</h4>
                                    </div>
                                    <p>
                                        {{ $member->team->jobdesc }}
                                    </p>
                                    <div class="member-meta">
                                        <span>Divisi {{ $member->team->name }}</span>
                                        <span>Angkatan {{ $member->intake_year }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
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
                    <a href="{{ route('member.registration') }}" class="btn btn-primary">Daftar Sekarang</a>
                    <a href="https://wa.me/628989649370" target="_blank" class=" btn btn-outline">Hubungi Pengurus</a>
                </div>
            </div>
        </div>
    </section>

    <x-slot:scripts>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
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
    </x-slot:scripts>
    </x-layouts.guest.app>