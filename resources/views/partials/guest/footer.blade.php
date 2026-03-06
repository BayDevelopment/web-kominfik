<footer class="footer-note">
    <div class="container footer-inner">
        <div class="footer-left">
            <span>© {{ date('Y') }}</span>
            <span class="footer-brand">KOMINFIK</span>
            <span>— Komunitas Mahasiswa Informatika Fakultas Ilmu Komputer</span>
        </div>

        <div class="footer-right">
            Collaborative Developer
        </div>
    </div>
</footer>

@push('styles')
    <style>
        .footer-note {
            padding: 24px 0 36px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(10px);
        }

        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            color: #9fb2cd;
            font-size: 0.92rem;
        }

        .footer-left {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .footer-right {
            text-align: right;
            white-space: nowrap;
            color: #c8d7ee;
            font-weight: 600;
        }

        .footer-brand {
            color: #4f8cff !important;
            font-weight: 800;
            letter-spacing: 0.4px;
        }

        @media (max-width: 768px) {
            .footer-note {
                padding: 20px 0 28px;
            }

            .footer-inner {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
                gap: 10px;
            }

            .footer-right {
                text-align: left;
                white-space: normal;
            }
        }
    </style>
@endpush
