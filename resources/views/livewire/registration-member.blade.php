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
                                    <input type="file" id="avatar" wire:model="avatar" accept="image/*" hidden
                                        x-on:change="handleAvatarChange(event)">

                                    {{-- wire:ignore = Livewire TIDAK akan re-render div ini --}}
                                    <div wire:ignore>

                                        {{-- State 1: Belum ada foto --}}
                                        <div id="avatar-empty">
                                            <label for="avatar" class="upload-label mt-6">Pilih Foto</label>
                                            <p class="upload-info">Format: JPG, JPEG, PNG - Maks 1MB</p>
                                        </div>

                                        {{-- State 2: Loading --}}
                                        <div id="avatar-loading" style="display:none;" class="uploading-text">
                                            ⏳ Mengupload foto...
                                        </div>

                                        {{-- State 3: Preview --}}
                                        <div id="avatar-preview" style="display:none;">
                                            <img id="avatar-img" src="" class="preview-img" alt="Preview">
                                            <button type="button" onclick="removeAvatar()"
                                                style="display:block; margin-top:8px; color:#ef4444; font-size:12px; background:none; border:none; cursor:pointer; padding:0;">
                                                ✕ Hapus & Ganti
                                            </button>
                                        </div>

                                    </div>

                                    @error('avatar')
                                        <p class="invalid-input">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <script>
                                let avatarPreviewSrc = null;

                                function handleAvatarChange(event) {
                                    const file = event.target.files[0];
                                    if (!file) return;

                                    document.getElementById('avatar-empty').style.display = 'none';
                                    document.getElementById('avatar-loading').style.display = 'block';
                                    document.getElementById('avatar-preview').style.display = 'none';

                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        avatarPreviewSrc = e.target.result;
                                        document.getElementById('avatar-img').src = avatarPreviewSrc;
                                        document.getElementById('avatar-loading').style.display = 'none';
                                        document.getElementById('avatar-preview').style.display = 'block';
                                    };
                                    reader.readAsDataURL(file);

                                    // ✅ Trigger Livewire upload secara manual
                                    const livewireInput = document.createElement('input');
                                    livewireInput.type = 'file';

                                    // Pakai @this untuk set file ke Livewire property
                                    @this.upload('avatar', file,
                                        (uploadedFilename) => {
                                            // sukses upload ke Livewire
                                            console.log('Livewire upload done:', uploadedFilename);
                                        },
                                        (error) => {
                                            console.error('Upload error:', error);
                                        },
                                        (event) => {
                                            // progress
                                        }
                                    );
                                }

                                function removeAvatar() {
                                    avatarPreviewSrc = null;
                                    document.getElementById('avatar').value = '';
                                    document.getElementById('avatar-preview').style.display = 'none';
                                    document.getElementById('avatar-loading').style.display = 'none';
                                    document.getElementById('avatar-empty').style.display = 'block';
                                    @this.set('avatar', null);
                                }
                            </script>

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
                                    placeholder="https://linkedin.com/in/username" pattern="https://.*" required>
                                <small class="input-note">Gunakan link profil LinkedIn (https)</small>
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
                            <span wire:loading.remove
                                wire:target="{{ $type === 'member' ? 'submitMember' : 'submitKerjasama' }}">
                                {{ $type === 'member' ? 'Daftar Sekarang' : 'Kirim Pengajuan' }}
                            </span>
                            <span wire:loading
                                wire:target="{{ $type === 'member' ? 'submitMember' : 'submitKerjasama' }}"
                                style="display:none;">
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

        .btn-block {
            width: 100%;
            justify-content: center;
            padding: 18px !important;
            font-size: 1.1rem !important;
            border-radius: 18px !important;
        }

        .invalid-input {
            color: #ef4444;
            font-size: 13px;
            font-weight: bold;
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

        .upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 20px 14px;
            margin: 8px 0;
            border-radius: 14px;
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            color: #fff;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-sizing: border-box;
        }

        .upload-label:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
        }

        .upload-info {
            font-size: 13px;
            color: #94a3b8;
            line-height: 1.5;
        }

        .uploading-text {
            font-size: 13px;
            color: #f59e0b;
            font-weight: 500;
        }

        .preview-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 12px;
            margin-top: 10px;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .registration-page {
                padding: 100px 0 60px;
            }

            .registration-card {
                padding: 32px 24px;
            }

            .registration-header h1 {
                font-size: 2rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group[style*="grid-column: span 2"] {
                grid-column: span 1 !important;
            }

            .btn-block {
                padding: 16px !important;
                font-size: 1rem !important;
            }

            .preview-img {
                width: 64px;
                height: 64px;
            }
        }

        @media (max-width: 400px) {
            .registration-card {
                padding: 24px 16px;
                border-radius: 20px;
            }

            .form-group input,
            .form-group select,
            textarea {
                padding: 12px 16px;
                font-size: 0.95rem;
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
    </style>
</x-slot:styles>
