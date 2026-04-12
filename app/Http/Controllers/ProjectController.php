<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // Menggunakan query builder untuk fleksibilitas
        $query = ProjectModel::query();

        // Logika Filter Sorting
        if ($request->has('sort')) {
            if ($request->sort === 'oldest') {
                $query->oldest(); // Mengurutkan berdasarkan created_at ASC
            } else {
                $query->latest(); // Default: Terbaru (created_at DESC)
            }
        } else {
            $query->latest(); // Default saat pertama kali buka halaman
        }

        // Eksekusi paginasi
        $projects = $query->paginate(4);

        // 🔥 AJAX Handling untuk Infinite Scroll
        if ($request->ajax()) {
            // Render hanya bagian card saja
            return view('components.project-card', compact('projects'))->render();
        }

        // Default return halaman penuh
        return view('pages.guest.project-all', compact('projects'));
    }
}
