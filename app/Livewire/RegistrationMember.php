<?php

namespace App\Livewire;

use App\Models\Member;
use App\Models\Partnership;
use App\Models\Team;
use App\Mail\RegistrationSuccessMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class RegistrationMember extends Component
{
    use WithFileUploads;

    public $type;

    // MEMBER
    public $name = '';
    public $avatar;
    public $intake_year = '';
    public $team_id = '';
    public $email = '';
    public $phone = '';
    public $linkedin = '';

    // KERJASAMA
    public $instansi_nama;
    public $instansi_email;
    public $instansi_phone;
    public $pic_name;
    public $deskripsi;

    public function mount($type)
    {
        $this->type = $type;
        $this->intake_year = Carbon::now()->subYears(4)->year;
    }

    public function render()
    {
        return view('livewire.registration-member', [
            'teams' => Team::all()
        ]);
    }

    // ================= MEMBER =================
    public function submitMember()
    {
        // 🔐 RATE LIMIT
        $key = 'register-member-' . md5(request()->ip() . $this->email);

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            $this->addError('rate_limit', 'Terlalu banyak percobaan. Coba lagi dalam ' . ceil($seconds / 60) . ' menit.');
            return;
        }

        RateLimiter::hit($key, 300);

        // 🔐 VALIDASI TEAM EXIST DOUBLE CHECK
        if (!Team::where('id', $this->team_id)->exists()) {
            $this->addError('team_id', 'Divisi tidak valid.');
            return;
        }

        $validated = $this->validate([
            'name' => 'required|string|min:3|max:255',

            'avatar' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                'max:1024'
            ],

            'intake_year' => 'required|digits:4',
            'team_id' => 'required|exists:teams,id',
            'email' => 'required|email|max:255|unique:members,email',

            // 🔥 PHONE STRICT
            'phone' => ['required', 'regex:/^[0-9]{10,15}$/'],

            // 🔥 LINKEDIN SECURE
            'linkedin' => [
                'nullable',
                'url',
                'regex:/^https:\/\/(www\.)?linkedin\.com\/.+$/'
            ],

        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.min' => 'Nama minimal 3 karakter.',

            'avatar.required' => 'Avatar wajib diupload.',
            'avatar.image' => 'Avatar harus berupa gambar.',
            'avatar.mimes' => 'Avatar harus JPG atau PNG.',
            'avatar.max' => 'Ukuran maksimal 1MB.',

            'team_id.required' => 'Divisi wajib dipilih.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',

            'phone.required' => 'Nomor wajib diisi.',
            'phone.regex' => 'Nomor harus 10-15 digit angka.',

            'linkedin.url' => 'Link harus URL valid.',
            'linkedin.regex' => 'Gunakan link LinkedIn valid (https://linkedin.com/...)',
        ]);

        // 🔐 HARDEN FILE (MIME CHECK)
        $file = $this->avatar;

        if (!in_array($file->getMimeType(), ['image/jpeg', 'image/png'])) {
            $this->addError('avatar', 'File tidak valid.');
            return;
        }

        // 🔥 SAFE FILE NAME
        $filename = uniqid('avatar_', true) . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs('avatars', $filename, 'public');

        // 🔥 SANITASI
        $validated['name'] = Str::title(trim($validated['name']));
        $validated['email'] = strtolower(trim($validated['email']));
        $validated['phone'] = preg_replace('/[^0-9]/', '', $validated['phone']);
        $validated['is_active'] = false;
        $validated['avatar'] = $path;

        // 🔥 LINKEDIN SAFE
        $validated['linkedin'] = $this->linkedin
            ? filter_var(trim($this->linkedin), FILTER_SANITIZE_URL)
            : null;

        Member::create($validated);

        Mail::to($validated['email'])
            ->send(new RegistrationSuccessMail($validated['name']));

        Alert::success('Berhasil', 'Pendaftaran berhasil dikirim.');

        return redirect()->route('home');
    }

    // ================= KERJASAMA =================
    public function submitKerjasama()
    {
        $key = 'register-kerjasama-' . md5(request()->ip() . $this->instansi_email);

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            $this->addError('rate_limit', 'Terlalu banyak percobaan.');
            return;
        }

        RateLimiter::hit($key, 300);

        $validated = $this->validate([
            'instansi_nama' => 'required|string|min:3|max:255',
            'instansi_email' => 'required|email|max:255',
            'instansi_phone' => ['required', 'regex:/^[0-9]{10,20}$/'],
            'pic_name' => 'required|string|min:3|max:255',
            'deskripsi' => 'required|string|min:10',
        ]);

        // 🔥 SANITASI
        $validated['instansi_nama'] = Str::title(trim($validated['instansi_nama']));
        $validated['pic_name'] = Str::title(trim($validated['pic_name']));
        $validated['instansi_email'] = strtolower(trim($validated['instansi_email']));
        $validated['instansi_phone'] = preg_replace('/[^0-9]/', '', $validated['instansi_phone']);
        $validated['deskripsi'] = trim($validated['deskripsi']);

        $validated['type'] = $this->type;
        $validated['status'] = 'pending';
        $validated['submitted_at'] = now();

        Partnership::create($validated);

        Mail::to($validated['instansi_email'])
            ->send(new RegistrationSuccessMail($validated['pic_name']));

        Alert::success('Berhasil', 'Pengajuan kerjasama berhasil dikirim.');

        return redirect()->route('home');
    }
}
