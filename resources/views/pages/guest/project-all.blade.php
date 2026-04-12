<x-layouts.guest>
    <section class="projects">
        <div class="container">

            <!-- HEADER + FILTER -->
            <div class="projects-top">

                <!-- HEADER -->
                <div class="projects-header">
                    <h1>Semua Project</h1>
                    <p>Eksplorasi berbagai karya digital yang telah dikembangkan.</p>
                </div>

                <!-- FILTER -->
                <div class="projects-filter-wrapper">
                    <form method="GET" class="project-filter">

                        <!-- dropdown -->
                        <div class="custom-select" id="customSelect">

                            <div class="select-trigger" id="trigger">
                                {{ request('sort') === 'oldest' ? 'Terlama' : 'Terbaru' }}
                            </div>

                            <div class="select-options" id="options">
                                <div data-value="latest" class="{{ request('sort') === 'latest' ? 'active' : '' }}">
                                    Terbaru
                                </div>
                                <div data-value="oldest" class="{{ request('sort') === 'oldest' ? 'active' : '' }}">
                                    Terlama
                                </div>
                            </div>

                            <input type="hidden" name="sort" id="sortInput" value="{{ request('sort', 'latest') }}">
                        </div>

                        <!-- action -->
                        <div class="filter-actions">
                            <button type="submit" class="btn btn-primary">Filter</button>

                            <!-- 🔥 FIX ROUTE -->
                            <a href="{{ route('projects.all') }}" class="btn btn-reset">Reset</a>
                        </div>

                    </form>
                </div>

            </div>

            <!-- GRID -->
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
            /* ===== SECTION ===== */
            .projects {
                width: 100%;
                padding-top: 20px;
            }

            /* ===== HEADER ===== */
            .projects-header {
                margin-bottom: 28px;
            }

            .projects-header h1 {
                font-size: 2.2rem;
                font-weight: 800;
                color: var(--text);
            }

            .projects-header p {
                color: var(--muted);
                font-size: 0.95rem;
            }

            /* ===== FILTER (CUSTOM DROPDOWN) ===== */
            .custom-select {
                position: relative;
                width: 180px;
            }

            .select-trigger {
                padding: 10px 16px;
                border-radius: 999px;
                background: #0c1b31;
                color: #fff;
                border: 1px solid rgba(255, 255, 255, 0.2);
                cursor: pointer;
                transition: 0.25s;
            }

            .select-trigger:hover {
                border-color: #4f8cff;
            }

            .select-options {
                position: absolute;
                top: 110%;
                left: 0;
                width: 100%;
                background: #0c1b31;
                border-radius: 12px;
                border: 1px solid rgba(255, 255, 255, 0.1);
                display: none;
                z-index: 100;
                overflow: hidden;
            }

            .select-options div {
                padding: 10px 14px;
                cursor: pointer;
            }

            .select-options div:hover {
                background: #1e3a8a;
            }

            .select-options .active {
                background: #2563eb;
            }

            /* ===== BUTTON RESET ===== */
            .btn-reset {
                padding: 10px 18px;
                border-radius: 999px;
                background: var(--card);
                border: 1px solid var(--card-border);
                color: var(--text);
            }

            /* ===== GRID ===== */
            .project-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
                gap: 24px;
            }

            /* ===== CARD ===== */
            .project-card {
                background: var(--card);
                border: 1px solid var(--card-border);
                border-radius: var(--radius);
                overflow: hidden;
                box-shadow: var(--shadow);
                position: relative;
                transition: 0.3s;
            }

            .project-card:hover {
                transform: translateY(-6px);
            }

            /* 🔥 FIX CLICK */
            .project-card::before {
                content: "";
                position: absolute;
                inset: 0;
                border-radius: inherit;
                pointer-events: none;
                /* penting */
            }

            /* ===== IMAGE ===== */
            .project-image {
                height: 200px;
                overflow: hidden;
            }

            .project-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            /* ===== CONTENT ===== */
            .project-content {
                padding: 18px;
                position: relative;
                z-index: 2;
            }

            .project-content h3 {
                color: var(--text);
                font-size: 1.1rem;
                margin-bottom: 6px;
            }

            .project-content p {
                color: var(--muted);
                font-size: 0.9rem;
                margin-bottom: 14px;
            }

            /* ===== ACTION ===== */
            .project-actions {
                position: relative;
                z-index: 3;
            }

            /* ===== LOADER ===== */
            #loading {
                display: none;
                justify-content: center;
                margin-top: 30px;
            }

            #loading span {
                padding: 8px 20px;
                border-radius: 999px;
                background: var(--card);
                border: 1px solid var(--card-border);
                color: var(--muted);
            }

            /* tambahan */
            /* wrapper atas */
            .projects-top {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 20px;
                margin-bottom: 30px;
                flex-wrap: wrap;
            }

            /* filter wrapper */
            .projects-filter-wrapper {
                display: flex;
                align-items: center;
            }

            /* form */
            .project-filter {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            /* tombol */
            .filter-actions {
                display: flex;
                gap: 8px;
            }
        </style>
    </x-slot:styles>

    <x-slot:scripts>
        <script>
            let page = 2;
            let loading = false;
            let lastPage = false;

            const trigger = document.getElementById('trigger');
            const options = document.getElementById('options');
            const input = document.getElementById('sortInput');
            const selectBox = document.getElementById('customSelect');

            // ===== DROPDOWN =====
            trigger.addEventListener('click', () => {
                options.style.display = options.style.display === 'block' ? 'none' : 'block';
            });

            options.querySelectorAll('div').forEach(opt => {
                opt.addEventListener('click', () => {
                    trigger.innerText = opt.innerText;
                    input.value = opt.dataset.value;
                    options.style.display = 'none';
                    selectBox.closest('form').submit();
                });
            });

            document.addEventListener('click', (e) => {
                if (!selectBox.contains(e.target)) {
                    options.style.display = 'none';
                }
            });

            // ===== INFINITE SCROLL =====
            const loadMoreData = () => {
                if (loading || lastPage) return;

                loading = true;
                const loadingEl = document.getElementById('loading');
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
                        if (data.trim() === '') {
                            lastPage = true;
                            loadingEl.innerHTML = "<span>Semua data sudah dimuat ✨</span>";
                            return;
                        }

                        document.getElementById('project-container')
                            .insertAdjacentHTML('beforeend', data);

                        page++;
                        loading = false;
                        loadingEl.style.display = 'none';
                    })
                    .catch(() => {
                        loading = false;
                        loadingEl.style.display = 'none';
                    });
            };

            window.addEventListener('scroll', () => {
                if ((window.innerHeight + window.scrollY) >= document.documentElement.scrollHeight - 100) {
                    loadMoreData();
                }
            });
        </script>
    </x-slot:scripts>

</x-layouts.guest>
