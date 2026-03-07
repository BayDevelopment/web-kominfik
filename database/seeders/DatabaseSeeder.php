<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use App\Models\Member;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'password'

        ]);

        Team::create([
            'name' => 'Front-end Developer',
            'jobdesc' => 'Implementasi HTML, CSS, JS: Menulis kode yang bersih dan terstruktur untuk antarmuka pengguna.'
        ]);

        Team::create([
            'name' => 'Back-end Developer',
            'jobdesc' => 'Manajemen database: Mendesain skema, membuat migration, query optimasi, dan menjaga integritas data.'
        ]);

        Team::create([
            'name' => 'Fullstack Developer',
            'jobdesc' => 'Mengembangkan aplikasi dari sisi frontend dan backend: membangun antarmuka pengguna yang responsif sekaligus merancang API, mengelola database, dan mengimplementasikan business logic agar sistem berjalan optimal.'
        ]);

        Member::create([
            'name' => 'Bayu Albar Ladici',
            'team_id' => 3,
            'intake_year' => 2022,
            'is_active' => true
        ]);

        Member::create([
            'name' => 'Arya Adhi Prasetyo',
            'team_id' => 3,
            'intake_year' => 2022,
            'is_active' => true
        ]);

        HeroSection::create([
            'title' => 'Wadah Berkembang dan Berkarya untuk Mahasiswa Informatika ',
            'sub_title' => 'KOMINFIK adalah Komunitas Mahasiswa Informatika Fakultas Ilmu Komputer yang menjadi ruang kolaborasi, pengembangan skill, kepemimpinan, serta inovasi digital untuk generasi mahasiswa yang adaptif dan visioner.',
            'vision' => 'Menjadi komunitas mahasiswa informatika yang inspiratif, unggul, dan berdampak bagi lingkungan akademik maupun masyarakat digital.',
            'total_activity' => '5',
            'total_event' => 10
        ]);
    }
}
