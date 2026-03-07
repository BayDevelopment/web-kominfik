<section class="registration-page">
    <div class="container">
        <div class="registration-header">
            <span class="tag">Pendaftaran Anggota</span>
            <h1>Bergabung dengan KOMINFIK</h1>
            <p>Jadilah bagian dari komunitas mahasiswa informatika yang visioner dan kolaboratif.</p>
        </div>

        <div class="registration-wrapper">
            <div class="registration-card">
                <form wire:submit.prevent="handleSubmit" class="registration-form">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" wire:model="name" placeholder="Masukkan nama lengkap Anda"
                                required>
                            @error('name')
                                <p class="invalid-input">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="intake_year">Tahun Angkatan</label>
                            <input type="text" id="intake_year" wire:model="intake_year" placeholder="Contoh: 2024"
                                required>
                            @error('intake_year')
                                <p class="invalid-input">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="team_id">Pilih Divisi / Tim</label>
                            <select id="team_id" wire:model="team_id" required>
                                <option value="">-- Pilih Divisi --</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                            @error('team_id')
                                <p class="invalid-input">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary btn-block" wire:loading.attr="disabled"
                            wire:target="handleSubmit">
                            Daftar Sekarang ✨
                        </button>
                        <p class="form-note">
                            Dengan mendaftar, Anda setuju untuk mengikuti aturan dan budaya organisasi KOMINFIK.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<x-slot:styles>
    <style>
        .registration-page {
            padding: 120px 0 80px;
            min-height: 80vh;
        }

        .registration-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 48px;
        }

        .registration-header h1 {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            margin-bottom: 16px;
            line-height: 1.1;
        }

        .registration-header p {
            color: var(--muted);
            font-size: 1.1rem;
        }

        .registration-wrapper {
            display: flex;
            justify-content: center;
        }

        .registration-card {
            width: 100%;
            max-width: 800px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.10);
            border-radius: 32px;
            padding: 48px;
            backdrop-filter: blur(20px);
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.3);
        }

        .registration-form {
            display: grid;
            gap: 32px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-group label {
            font-size: 0.95rem;
            font-weight: 600;
            color: #DBE7FF;
            margin-left: 4px;
        }

        .form-group input,
        .form-group select {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 14px 20px;
            color: #fff;
            font-size: 1rem;
            transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 140, 255, 0.15);
        }

        .form-group select option {
            background: #1a1f3c;
            color: #fff;
        }

        .form-footer {
            text-align: center;
            margin-top: 12px;
        }

        .btn-block {
            width: 100%;
            justify-content: center;
            padding: 18px !important;
            font-size: 1.1rem !important;
            border-radius: 18px !important;
        }

        .form-note {
            margin-top: 20px;
            font-size: 0.88rem;
            color: var(--muted);
        }

        .invalid-input {
            color: red;
            font-size: small;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .registration-card {
                padding: 32px 24px;
            }

            .registration-page {
                padding: 100px 0 60px;
            }
        }
    </style>
</x-slot:styles>