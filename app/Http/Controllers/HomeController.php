<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'KOMINFIK | Komunitas Mahasiswa Informatika Fakultas Ilmu Komputer'
        ];
        return view('pages.guest.home', $data);
    }

    protected array $members = [
        [
            'slug' => 'ahmad-rizky',
            'avatar' => 'AR',
            'name' => 'Ahmad Rizky',
            'badge' => 'Inti',
            'role' => 'Ketua Umum',
            'desc' => 'Memimpin arah komunitas, merancang strategi organisasi, serta mengoordinasikan seluruh program kerja utama KOMINFIK secara menyeluruh.',
            'division' => 'Divisi Inti',
            'batch' => 'Angkatan 2022',
            'focus' => 'Leadership',
        ],
        [
            'slug' => 'nadia-safitri',
            'avatar' => 'NS',
            'name' => 'Nadia Safitri',
            'badge' => 'Inti',
            'role' => 'Wakil Ketua',
            'desc' => 'Mendukung ketua dalam pelaksanaan program, memastikan koordinasi antar divisi, dan menjaga ritme kerja organisasi tetap efektif.',
            'division' => 'Divisi Inti',
            'batch' => 'Angkatan 2022',
            'focus' => 'Manajemen Tim',
        ],
        [
            'slug' => 'fajar-ananta',
            'avatar' => 'FA',
            'name' => 'Fajar Ananta',
            'badge' => 'Inti',
            'role' => 'Sekretaris',
            'desc' => 'Mengelola administrasi, menyusun dokumentasi kegiatan, membuat notulensi rapat, dan memastikan arsip organisasi tersimpan dengan baik.',
            'division' => 'Administrasi',
            'batch' => 'Angkatan 2023',
            'focus' => 'Dokumentasi',
        ],
        [
            'slug' => 'dinda-lestari',
            'avatar' => 'DL',
            'name' => 'Dinda Lestari',
            'badge' => 'Inti',
            'role' => 'Bendahara',
            'desc' => 'Bertanggung jawab atas pengelolaan keuangan organisasi, penyusunan laporan, serta memastikan transparansi dan efisiensi penggunaan anggaran.',
            'division' => 'Keuangan',
            'batch' => 'Angkatan 2023',
            'focus' => 'Administrasi',
        ],
        [
            'slug' => 'raka-pratama',
            'avatar' => 'RP',
            'name' => 'Raka Pratama',
            'badge' => 'Koordinator',
            'role' => 'Koordinator Akademik',
            'desc' => 'Menginisiasi kelas belajar, mentoring, diskusi teknis, dan kegiatan akademik yang mendukung peningkatan kompetensi mahasiswa informatika.',
            'division' => 'Akademik',
            'batch' => 'Angkatan 2022',
            'focus' => 'Mentoring',
        ],
        [
            'slug' => 'intan-maharani',
            'avatar' => 'IM',
            'name' => 'Intan Maharani',
            'badge' => 'Koordinator',
            'role' => 'Koordinator Media',
            'desc' => 'Mengelola identitas digital komunitas, publikasi media sosial, dokumentasi konten, dan strategi komunikasi visual KOMINFIK.',
            'division' => 'Media',
            'batch' => 'Angkatan 2023',
            'focus' => 'Branding',
        ],
        [
            'slug' => 'bayu-prasetyo',
            'avatar' => 'BY',
            'name' => 'Bayu Prasetyo',
            'badge' => 'Koordinator',
            'role' => 'Koordinator Event',
            'desc' => 'Menyusun konsep kegiatan, mengatur timeline acara, dan memastikan seminar, workshop, maupun event berjalan dengan baik dan terstruktur.',
            'division' => 'Event Organizer',
            'batch' => 'Angkatan 2022',
            'focus' => 'Public Speaking',
        ],
        [
            'slug' => 'salsa-amelia',
            'avatar' => 'SA',
            'name' => 'Salsa Amelia',
            'badge' => 'Divisi',
            'role' => 'UI/UX Division',
            'desc' => 'Fokus pada desain antarmuka, pengalaman pengguna, dan pengembangan tampilan visual yang modern untuk kebutuhan project komunitas.',
            'division' => 'UI/UX',
            'batch' => 'Angkatan 2024',
            'focus' => 'Product Design',
        ],
        [
            'slug' => 'muhammad-fikri',
            'avatar' => 'MF',
            'name' => 'Muhammad Fikri',
            'badge' => 'Divisi',
            'role' => 'Web Developer',
            'desc' => 'Mengembangkan website, fitur internal, dan sistem digital untuk mendukung kebutuhan organisasi serta pengembangan project komunitas.',
            'division' => 'Development',
            'batch' => 'Angkatan 2023',
            'focus' => 'Laravel',
        ],
        [
            'slug' => 'laila-azzahra',
            'avatar' => 'LA',
            'name' => 'Laila Azzahra',
            'badge' => 'Divisi',
            'role' => 'Public Relation',
            'desc' => 'Membangun relasi eksternal, menjalin komunikasi dengan pihak kampus maupun mitra, dan memperkuat citra positif organisasi di publik.',
            'division' => 'Humas',
            'batch' => 'Angkatan 2024',
            'focus' => 'Communication',
        ],
        [
            'slug' => 'dio-valencia',
            'avatar' => 'DV',
            'name' => 'Dio Valencia',
            'badge' => 'Divisi',
            'role' => 'Creative Team',
            'desc' => 'Menciptakan materi visual, konten promosi, desain publikasi, dan kebutuhan kreatif untuk mendukung kegiatan serta branding KOMINFIK.',
            'division' => 'Creative',
            'batch' => 'Angkatan 2023',
            'focus' => 'Graphic Design',
        ],
        [
            'slug' => 'citra-ramadhani',
            'avatar' => 'CR',
            'name' => 'Citra Ramadhani',
            'badge' => 'Aktif',
            'role' => 'Member Active',
            'desc' => 'Aktif berpartisipasi dalam kegiatan komunitas, project internal, dan program pengembangan kompetensi untuk mendukung pertumbuhan organisasi.',
            'division' => 'Member',
            'batch' => 'Angkatan 2024',
            'focus' => 'Tech Enthusiast',
        ],
    ];

    public function memberDetail(string $slug)
    {
        $member = collect($this->members)->firstWhere('slug', $slug);

        abort_if(!$member, 404);

        return view('pages.guest.member-detail', compact('member'));
    }
}
