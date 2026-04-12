<section class="registration-page fade-in">
    <div class="container">

        {{-- HEADER --}}
        @php
            $isMember = $type === 'member';
        @endphp

        <div class="registration-header text-center">

            <h1>
                {{ $isMember ? 'Pendaftaran Member' : 'Form Kerjasama' }}
            </h1>

            <p style="font-size:14px; color:#666; margin-bottom:16px;">
                {{ $isMember
                    ? 'Silakan isi form berikut untuk mendaftar sebagai member. Data Anda akan kami verifikasi terlebih dahulu sebelum disetujui.'
                    : 'Silakan isi form berikut untuk mengajukan kerjasama. Tim kami akan meninjau pengajuan Anda dan menghubungi Anda kembali melalui email.' }}
            </p>

        </div>

        <div class="registration-wrapper">
            <div class="registration-card">

                <form wire:submit.prevent="{{ $type === 'member' ? 'submitMember' : 'submitKerjasama' }}"
                    class="registration-form">

                    <div class="form-grid">

                        {{-- ================= MEMBER ================= --}}
                        @if ($type === 'member')

                            <div class="form-group">
                                <label>Avatar</label>

                                <div class="upload-box">

                                    <!-- input file -->
                                    <input type="file" wire:model="avatar" id="avatar" hidden>

                                    <!-- tombol upload -->
                                    <label for="avatar" class="upload-label">
                                        Pilih Foto
                                    </label>

                                    <!-- info -->
                                    <p class="upload-info">
                                        Format: JPG, JPEG, PNG - 1MB
                                    </p>

                                    <!-- loading (FIX) -->
                                    @if ($avatar)
                                        <p wire:loading wire:target="avatar" class="uploading-text">
                                            Uploading...
                                        </p>
                                    @endif

                                    <!-- preview -->
                                    @if ($avatar)
                                        <img src="{{ $avatar->temporaryUrl() }}" class="preview-img">
                                    @endif

                                    <!-- error -->
                                    @error('avatar')
                                        <p class="invalid-input">{{ $message }}</p>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" wire:model.defer="name" placeholder="Masukkan nama lengkap">
                                @error('name')
                                    <p class="invalid-input">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tahun Angkatan</label>
                                <input type="number" wire:model.defer="intake_year" placeholder="Contoh: 2024">
                                @error('intake_year')
                                    <p class="invalid-input">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Divisi</label>
                                <select wire:model.defer="team_id" {{ $teams->isEmpty() ? 'disabled' : '' }}>
                                    @if ($teams->isEmpty())
                                        <option>Divisi kosong</option>
                                    @else
                                        <option value="">Pilih Divisi</option>
                                        @foreach ($teams as $team)
                                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('team_id')
                                    <p class="invalid-input">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" wire:model.defer="email" placeholder="Masukkan email">
                                @error('email')
                                    <p class="invalid-input">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>No WhatsApp</label>
                                <input type="tel" wire:model.defer="phone" placeholder="628xxxx">
                                @error('phone')
                                    <p class="invalid-input">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>LinkedIn</label>

                                <input type="url" wire:model.defer="linkedin"
                                    placeholder="https://linkedin.com/in/username" pattern="https://.*">

                                <small class="input-note">
                                    Gunakan link profil LinkedIn (https)
                                </small>

                                @error('linkedin')
                                    <p class="invalid-input">{{ $message }}</p>
                                @enderror
                            </div>

                        @endif


                        {{-- ================= KERJASAMA ================= --}}
                        @if (in_array($type, ['sponsor', 'university']))
                            <div class="form-group">
                                <label>Nama Instansi</label>
                                <input type="text" wire:model.defer="instansi_nama"
                                    placeholder="Contoh: PT Maju Jaya / Universitas Indonesia">
                                @error('instansi_nama')
                                    <p class="invalid-input">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email Instansi</label>
                                <input type="email" wire:model.defer="instansi_email"
                                    placeholder="Contoh: info@instansi.com">
                                @error('instansi_email')
                                    <p class="invalid-input">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>No WhatsApp Instansi</label>
                                <input type="tel" wire:model.defer="instansi_phone"
                                    placeholder="Contoh: 628123456789">
                                @error('instansi_phone')
                                    <p class="invalid-input">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nama PIC (Penanggung Jawab)</label>
                                <input type="text" wire:model.defer="pic_name" placeholder="Contoh: Budi Santoso">
                                @error('pic_name')
                                    <p class="invalid-input">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group" style="grid-column: span 2;">
                                <label>Deskripsi Kerjasama</label>
                                <textarea wire:model.defer="deskripsi" rows="4"
                                    placeholder="Jelaskan bentuk kerjasama yang ingin diajukan, contoh: sponsorship event, kolaborasi riset, dll"></textarea>
                                @error('deskripsi')
                                    <p class="invalid-input">{{ $message }}</p>
                                @enderror
                            </div>
                        @endif

                    </div>

                    {{-- BUTTON --}}
                    <div style="display:flex; flex-direction:column; gap:12px; margin-top:24px;">

                        <button type="button" onclick="window.history.back()" class="btn btn-secondary btn-block">
                            Kembali
                        </button>

                        <button type="submit" class="btn btn-primary btn-block" wire:loading.attr="disabled"
                            wire:target="{{ $type === 'member' ? 'submitMember' : 'submitKerjasama' }}">

                            <span wire:loading.remove>
                                {{ $type === 'member' ? 'Daftar Sekarang' : 'Kirim Pengajuan' }}
                            </span>

                            <span wire:loading style="display:none;">
                                Loading...
                            </span>

                        </button>

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

        .registration-type-wrapper {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 40px;
        }

        .type-card {
            padding: 28px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: 0.3s;
            text-align: center;
        }

        .type-card:hover {
            transform: translateY(-6px);
            border-color: var(--primary);
        }

        .type-card.active {
            border: 2px solid var(--primary);
        }

        .badge {
            display: inline-block;
            margin-top: 10px;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 0.75rem;
        }

        .badge.open {
            background: #16a34a;
            color: white;
        }

        .badge.closed {
            background: #dc2626;
            color: white;
        }

        @media (max-width: 768px) {
            .registration-type-wrapper {
                grid-template-columns: 1fr;
            }
        }

        textarea {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 14px 20px;
            color: #fff;
            font-size: 1rem;
            resize: none;
        }

        textarea:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 140, 255, 0.15);
        }

        /* ===== UPLOAD BOX ===== */
        .upload-box {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* tombol upload */
        .upload-label {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px;
            border-radius: 14px;
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* hover */
        .upload-label:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
        }

        /* info */
        .upload-info {
            font-size: 13px;
            color: #94a3b8;
            line-height: 1.5;
        }

        /* uploading */
        .uploading-text {
            font-size: 13px;
            color: #f59e0b;
            font-weight: 500;
        }

        /* preview */
        .preview-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 12px;
            margin-top: 10px;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        /* error */
        .invalid-input {
            color: #ef4444;
            font-size: 13px;
        }
    </style>
</x-slot:styles>
