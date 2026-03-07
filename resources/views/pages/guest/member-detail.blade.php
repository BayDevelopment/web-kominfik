<x-layouts.guest.app :title="'KOMINFIK | Members'">
    <section class="member-detail-page">
        <div class="container">
            <div class="member-detail-header">
                <a href="{{ route('home') }}#anggota" class="back-link">
                    ← Kembali ke daftar anggota
                </a>
            </div>

            <div class="member-detail-wrapper">
                <div class="member-detail-card">
                    <div class="member-detail-top">
                        <div class="member-detail-avatar">
                            {{ $member['avatar'] }}
                        </div>

                        <div class="member-detail-main">
                            <div class="member-detail-badge">
                                {{ $member['badge'] }}
                            </div>

                            <h1>{{ $member['name'] }}</h1>
                            <h3>{{ $member['role'] }}</h3>

                            <p class="member-detail-desc">
                                {{ $member['desc'] }}
                            </p>

                            <div class="member-detail-meta">
                                <span>{{ $member['division'] }}</span>
                                <span>{{ $member['batch'] }}</span>
                                <span>{{ $member['focus'] }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="member-detail-grid">
                        <div class="detail-box">
                            <h4>Profil Singkat</h4>
                            <p>
                                {{ $member['name'] }} merupakan bagian dari KOMINFIK yang berperan sebagai
                                <strong>{{ $member['role'] }}</strong>. Dengan fokus pada
                                <strong>{{ $member['focus'] }}</strong>, anggota ini berkontribusi aktif
                                dalam pengembangan organisasi dan kegiatan komunitas.
                            </p>
                        </div>

                        <div class="detail-box">
                            <h4>Tanggung Jawab</h4>
                            <p>
                                Bertanggung jawab pada bidang <strong>{{ $member['division'] }}</strong>,
                                mendukung jalannya program kerja, menjaga kolaborasi tim, serta memastikan
                                setiap kegiatan berjalan efektif dan terarah.
                            </p>
                        </div>

                        <div class="detail-box">
                            <h4>Fokus Pengembangan</h4>
                            <ul>
                                <li>Penguatan kapasitas organisasi dan teamwork</li>
                                <li>Peningkatan kompetensi di bidang {{ $member['focus'] }}</li>
                                <li>Kolaborasi aktif dalam kegiatan KOMINFIK</li>
                                <li>Kontribusi terhadap program kerja mahasiswa informatika</li>
                            </ul>
                        </div>

                        <div class="detail-box">
                            <h4>Informasi Anggota</h4>
                            <div class="info-list">
                                <div><span>Nama</span><strong>{{ $member['name'] }}</strong></div>
                                <div><span>Jabatan</span><strong>{{ $member['role'] }}</strong></div>
                                <div><span>Divisi</span><strong>{{ $member['division'] }}</strong></div>
                                <div><span>Angkatan</span><strong>{{ $member['batch'] }}</strong></div>
                                <div><span>Fokus</span><strong>{{ $member['focus'] }}</strong></div>
                                <div><span>Status</span><strong>{{ $member['badge'] }}</strong></div>
                            </div>
                        </div>
                    </div>

                    <div class="member-detail-actions">
                        <a href="{{ route('home') }}#anggota" class="btn btn-outline">Kembali</a>
                        <a href="{{ route('home') }}#kontak" class="btn btn-primary">Hubungi Pengurus</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot:styles>
        <style>
            .member-detail-page {
                padding: 120px 0 80px;
            }

            .member-detail-header {
                margin-bottom: 24px;
            }

            .back-link {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                color: var(--muted);
                font-weight: 600;
                transition: 0.25s ease;
            }

            .back-link:hover {
                color: var(--text);
            }

            .member-detail-wrapper {
                display: flex;
                justify-content: center;
            }

            .member-detail-card {
                width: 100%;
                max-width: 1100px;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.10);
                border-radius: 32px;
                padding: 34px;
                backdrop-filter: blur(18px);
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.22);
            }

            .member-detail-top {
                display: grid;
                grid-template-columns: 160px 1fr;
                gap: 28px;
                align-items: center;
                margin-bottom: 32px;
            }

            .member-detail-avatar {
                width: 160px;
                height: 160px;
                border-radius: 36px;
                background: linear-gradient(135deg, var(--primary), var(--secondary));
                display: grid;
                place-items: center;
                font-size: 3rem;
                font-weight: 900;
                color: #fff;
                box-shadow: 0 18px 35px rgba(79, 140, 255, 0.28);
            }

            .member-detail-badge {
                display: inline-flex;
                padding: 8px 14px;
                border-radius: 999px;
                background: linear-gradient(135deg, var(--primary), var(--secondary));
                color: #fff;
                font-size: 0.82rem;
                font-weight: 700;
                margin-bottom: 14px;
            }

            .member-detail-main h1 {
                font-size: clamp(2rem, 4vw, 3rem);
                margin-bottom: 8px;
                line-height: 1.1;
            }

            .member-detail-main h3 {
                color: #cfe0ff;
                font-size: 1.05rem;
                font-weight: 600;
                margin-bottom: 14px;
            }

            .member-detail-desc {
                color: var(--muted);
                max-width: 760px;
                margin-bottom: 18px;
            }

            .member-detail-meta {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }

            .member-detail-meta span {
                padding: 8px 12px;
                border-radius: 999px;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.08);
                color: #dbe7ff;
                font-size: 0.84rem;
            }

            .member-detail-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
                margin-bottom: 28px;
            }

            .detail-box {
                background: rgba(255, 255, 255, 0.04);
                border: 1px solid rgba(255, 255, 255, 0.08);
                border-radius: 24px;
                padding: 24px;
            }

            .detail-box h4 {
                font-size: 1.05rem;
                margin-bottom: 12px;
            }

            .detail-box p,
            .detail-box li {
                color: var(--muted);
                font-size: 0.95rem;
                line-height: 1.7;
            }

            .detail-box ul {
                padding-left: 18px;
            }

            .info-list {
                display: grid;
                gap: 12px;
            }

            .info-list div {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 14px;
                padding: 12px 14px;
                border-radius: 16px;
                background: rgba(255, 255, 255, 0.04);
            }

            .info-list span {
                color: var(--muted);
                font-size: 0.92rem;
            }

            .info-list strong {
                color: var(--text);
                text-align: right;
                font-size: 0.93rem;
            }

            .member-detail-actions {
                display: flex;
                gap: 14px;
                flex-wrap: wrap;
            }

            @media (max-width: 860px) {
                .member-detail-top {
                    grid-template-columns: 1fr;
                    text-align: center;
                }

                .member-detail-avatar {
                    margin: 0 auto;
                }

                .member-detail-meta {
                    justify-content: center;
                }

                .member-detail-grid {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 640px) {
                .member-detail-page {
                    padding: 100px 0 60px;
                }

                .member-detail-card {
                    padding: 22px;
                    border-radius: 24px;
                }

                .member-detail-avatar {
                    width: 120px;
                    height: 120px;
                    border-radius: 28px;
                    font-size: 2.2rem;
                }

                .member-detail-actions {
                    flex-direction: column;
                }

                .info-list div {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .info-list strong {
                    text-align: left;
                }
            }
        </style>
    </x-slot:styles>
</x-layouts.guest.app>