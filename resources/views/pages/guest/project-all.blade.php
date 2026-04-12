<x-layouts.guest>
    <section class="projects">
        <div class="container">

            <!-- HEADER -->
            <div class="projects-header">
                <h1>Semua Project</h1>
                <p>Eksplorasi berbagai karya digital yang telah dikembangkan.</p>
            </div>

            <!-- FILTER -->
            <form method="GET" class="project-filter">

                <select name="sort">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                </select>

                <button type="submit" class="btn btn-primary">Filter</button>

                <!-- 🔥 FIX ROUTE -->
                <a href="{{ route('projects.all') }}" class="btn btn-reset">Reset</a>
            </form>

            <!-- 🔥 GRID (HANYA 1, JANGAN DUPLIKAT) -->
            <div class="project-grid" id="project-container">
                @include('components.project-card', ['projects' => $projects])
            </div>

            <!-- LOADING -->
            <div id="loading">
                <span>Loading...</span>
            </div>

        </div>
    </section>

    <x-slot:styles>
        <style>
            /* 🔥 GLOBAL FIX (ANTI GESER) */
            body {
                overflow-x: hidden;
            }

            /* 🔥 SECTION */
            .projects {
                width: 100%;
            }

            /* 🔥 CONTAINER */
            .container {
                max-width: 1200px;
                margin: 0 auto;
                width: 100%;
            }

            /* ===== HEADER ===== */
            .projects-header {
                margin-bottom: 24px;
            }

            .projects-header h1 {
                font-size: 30px;
                font-weight: 700;
            }

            .projects-header p {
                color: #94a3b8;
                font-size: 14px;
            }

            /* ===== FILTER ===== */
            .project-filter {
                display: flex;
                gap: 10px;
                flex-wrap: wrap;
                margin-bottom: 25px;
            }

            .project-filter select {
                padding: 10px 14px;
                border-radius: 10px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                background: transparent;
                color: #fff;
            }

            .btn-reset {
                padding: 10px 16px;
                border-radius: 10px;
                background: rgba(255, 255, 255, 0.1);
                text-decoration: none;
                color: #fff;
            }

            /* ===== GRID ===== */
            .project-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
                gap: 24px;
                width: 100%;
                align-items: stretch;
            }

            /* ===== CARD ===== */
            .project-card {
                width: 100%;
                background: #ffffff;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 6px 24px rgba(0, 0, 0, 0.08);
                transition: 0.3s ease;
            }

            .project-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 14px 40px rgba(0, 0, 0, 0.12);
            }

            /* ===== IMAGE ===== */
            .project-image img {
                width: 100%;
                height: 180px;
                object-fit: cover;
            }

            /* ===== BODY ===== */
            .project-body {
                padding: 16px;
            }

            .project-body h3 {
                font-size: 16px;
                font-weight: 600;
                margin-bottom: 8px;
            }

            .project-body p {
                font-size: 14px;
                color: #64748b;
                margin-bottom: 14px;
            }

            /* ===== LOADER ===== */
            #loading {
                display: none;
                /* Default sembunyi */
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 40px 0;
                /* Memberi ruang di bawah grid */
                clear: both;
            }

            #loading span {
                background: rgba(255, 255, 255, 0.05);
                padding: 10px 24px;
                border-radius: 50px;
                border: 1px solid rgba(255, 255, 255, 0.1);
                color: #94a3b8;
                font-size: 14px;
                text-align: center;
                backdrop-filter: blur(4px);
                display: inline-block;
                transition: all 0.3s ease;
            }
        </style>
    </x-slot:styles>

    <x-slot:scripts>
        <script>
            let page = 2; // Halaman berikutnya yang akan dimuat
            let loading = false;
            let lastPage = false;

            // Fungsi Load Data
            const loadMoreData = () => {
                if (loading || lastPage) return;

                loading = true;
                const loadingEl = document.getElementById('loading');

                // 🔥 Gunakan flex agar justify-center berfungsi
                loadingEl.style.display = 'flex';
                loadingEl.innerHTML = "<span>Memuat data...</span>";

                let params = new URLSearchParams(window.location.search);
                params.set('page', page);

                fetch(`?${params.toString()}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(data => {
                        if (data.trim().length === 0) {
                            lastPage = true;
                            loadingEl.style.display = 'flex';
                            loadingEl.innerHTML = "<span>Semua data sudah dimuat ✨</span>";
                            return;
                        }

                        const container = document.getElementById('project-container');
                        container.insertAdjacentHTML('beforeend', data);

                        page++;
                        loading = false;
                        loadingEl.style.display = 'none'; // Sembunyikan jika masih ada data selanjutnya
                    })
                    .catch(err => {
                        console.error("Error:", err);
                        loading = false;
                        loadingEl.style.display = 'none';
                    });
            };

            // Scroll Event Listener
            window.addEventListener('scroll', () => {
                // Deteksi jika user sudah mendekati bawah halaman (offset 100px)
                if ((window.innerHeight + window.scrollY) >= document.documentElement.scrollHeight - 100) {
                    loadMoreData();
                }
            });

            // Debugging filter: Jika user ganti filter, pastikan reset variabel page
            // (Ini otomatis terjadi karena form submit akan reload page ke hal 1)
        </script>
    </x-slot:scripts>

</x-layouts.guest>
