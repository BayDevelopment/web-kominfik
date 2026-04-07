<section class="registration-page fade-in">
    <div class="container">

        {{-- HEADER --}}
        <div class="registration-header text-center">
            <h1>Pilih Jenis Pendaftaran</h1>
            <p>Silakan pilih jenis pendaftaran yang tersedia</p>
        </div>

        <div class="registration-type-wrapper">

            @foreach ($registrations as $item)
                @php
                    $route = route('register', ['type' => $item->slug]);

                    $icon = match ($item->slug) {
                        'member' => '👤',
                        'sponsor' => '🤝',
                        'university' => '🎓',
                        default => '📄',
                    };
                @endphp

                <div class="type-card">

                    <div class="card-top">
                        <div class="card-icon">{{ $icon }}</div>

                        <span class="status {{ $item->is_available ? 'open' : 'closed' }}">
                            {{ $item->is_available ? 'Open' : 'Closed' }}
                        </span>
                    </div>

                    <div class="card-body">
                        <h3>{{ $item->name }}</h3>
                        <p>{{ $item->description }}</p>
                    </div>

                    <div class="card-footer">
                        @if ($item->is_available)
                            <a href="{{ $route }}" class="card-button">
                                Daftar →
                            </a>
                        @else
                            <span class="card-disabled">
                                Tidak tersedia
                            </span>
                        @endif
                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>
<x-slot:styles>
    <style>
        .registration-type-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 320px));
            justify-content: center;
            /* 🔥 ini kunci */
            gap: 28px;
            margin-top: 50px;
        }

        /* 🔥 CARD BASE */
        .type-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 28px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(12px);
            transition: all 0.3s ease;
        }

        /* subtle hover */
        .type-card:hover {
            transform: translateY(-6px);
            border-color: rgba(79, 140, 255, 0.4);
            box-shadow: 0 18px 50px rgba(0, 0, 0, 0.25);
        }

        /* 🔥 TOP */
        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        /* ICON STYLE */
        .card-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            font-size: 1.6rem;
            background: linear-gradient(135deg, rgba(79, 140, 255, 0.25), rgba(0, 194, 168, 0.2));
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* STATUS */
        .status {
            font-size: 0.7rem;
            padding: 6px 12px;
            border-radius: 999px;
            font-weight: 600;
        }

        .status.open {
            background: rgba(34, 197, 94, 0.15);
            color: #22c55e;
        }

        .status.closed {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
        }

        /* BODY */
        .card-body h3 {
            font-size: 1.25rem;
            margin-bottom: 8px;
        }

        .card-body p {
            color: var(--muted);
            font-size: 0.92rem;
            line-height: 1.6;
        }

        /* FOOTER */
        .card-footer {
            margin-top: 20px;
        }

        /* BUTTON */
        .card-button {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            color: var(--primary);
            transition: 0.3s;
        }

        .card-button:hover {
            transform: translateX(4px);
        }

        /* DISABLED */
        .card-disabled {
            color: #888;
            font-size: 0.9rem;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .registration-type-wrapper {
                grid-template-columns: 1fr;
            }
        }
    </style>
</x-slot:styles>
