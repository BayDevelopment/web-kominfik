<?php

namespace App\Livewire;

use App\Models\Member;
use App\Models\Partnership; // ✅ FIX nama model
use App\Models\Team;
use App\Mail\RegistrationSuccessMail; // ✅ mail
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail; // ✅ mail
use Illuminate\Support\Str;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class RegistrationMember extends Component
{
    public $type;

    // MEMBER
    public $name = '';
    public $intake_year = '';
    public $team_id = '';
    public $email = '';
    public $phone = '';

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

    // ===== MEMBER =====
    public function submitMember()
    {
        if (Team::count() === 0) {
            $this->addError('team_id', 'Data divisi belum tersedia, silakan hubungi admin.');
            return;
        }

        $validated = $this->validate([
            'name' => 'required|string|min:3|max:255',
            'intake_year' => 'required|digits:4',
            'team_id' => 'required|exists:teams,id',
            'email' => 'required|email|max:255|unique:members,email',
            'phone' => 'required|string|min:10|max:15',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.min' => 'Nama minimal 3 karakter.',

            'intake_year.required' => 'Tahun masuk wajib diisi.',
            'intake_year.digits' => 'Tahun masuk harus 4 digit (contoh: 2022).',

            'team_id.required' => 'Divisi wajib dipilih.',
            'team_id.exists' => 'Divisi yang dipilih tidak valid.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',

            'phone.required' => 'Nomor telepon wajib diisi.',
            'phone.min' => 'Nomor telepon minimal 10 digit.',
            'phone.max' => 'Nomor telepon maksimal 15 digit.',
        ]);

        // 🔥 Sanitasi
        $validated['name'] = Str::title(trim($validated['name']));
        $validated['email'] = strtolower(trim($validated['email']));
        $validated['phone'] = preg_replace('/[^0-9]/', '', $validated['phone']);

        $validated['is_active'] = false;

        // 🔥 Simpan
        Member::create($validated);

        // 🔥 Kirim Email
        Mail::to($validated['email'])
            ->send(new RegistrationSuccessMail($validated['name']));

        Alert::success('Berhasil', 'Pendaftaran berhasil dikirim.');

        return redirect()->route('home');
    }

    // ===== KERJASAMA =====
    public function submitKerjasama()
    {
        $validated = $this->validate([
            'instansi_nama' => 'required|string|min:3|max:255',
            'instansi_email' => 'required|email|max:255',
            'instansi_phone' => 'required|string|min:10|max:20',
            'pic_name' => 'required|string|min:3|max:255',
            'deskripsi' => 'required|string|min:10',
        ], [
            'instansi_nama.required' => 'Nama instansi wajib diisi.',
            'instansi_nama.min' => 'Nama instansi minimal 3 karakter.',

            'instansi_email.required' => 'Email instansi wajib diisi.',
            'instansi_email.email' => 'Format email tidak valid.',

            'instansi_phone.required' => 'Nomor telepon instansi wajib diisi.',
            'instansi_phone.min' => 'Nomor telepon minimal 10 digit.',

            'pic_name.required' => 'Nama PIC wajib diisi.',
            'pic_name.min' => 'Nama PIC minimal 3 karakter.',

            'deskripsi.required' => 'Deskripsi kerjasama wajib diisi.',
            'deskripsi.min' => 'Deskripsi minimal 10 karakter.',
        ]);

        // 🔥 Sanitasi
        $validated['instansi_nama'] = Str::title(trim($validated['instansi_nama']));
        $validated['pic_name'] = Str::title(trim($validated['pic_name']));
        $validated['instansi_email'] = strtolower(trim($validated['instansi_email']));
        $validated['instansi_phone'] = preg_replace('/[^0-9]/', '', $validated['instansi_phone']);
        $validated['deskripsi'] = trim($validated['deskripsi']);

        // 🔥 Default DB
        $validated['status'] = 'pending';
        $validated['submitted_at'] = now();

        // 🔥 Simpan
        Partnership::create($validated);

        // 🔥 Kirim Email
        Mail::to($validated['instansi_email'])
            ->send(new RegistrationSuccessMail($validated['pic_name']));

        Alert::success('Berhasil', 'Pengajuan kerjasama berhasil dikirim.');

        return redirect()->route('home');
    }
}
