<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Member;
use App\Models\ProjectModel;

class HomeController extends Controller
{
    public function index()
    {
        $hero_section = HeroSection::orderByDesc('id')->first();
        $members_count = Member::where('is_active', true)->count();
        $members = Member::where('is_active', true)->orderByDesc('id')->limit(5)->get();
        $projects = ProjectModel::where('is_published', true)->orderByDesc('id')->limit(3)->get();

        return view('pages.guest.home', compact('hero_section', 'members_count', 'members', 'projects'));
    }

    public function memberDetail(Member $member)
    {
        $member->load('team');

        abort_if(!$member->is_active, 404);

        return view('pages.guest.member-detail', [
            'member' => $member
        ]);
    }

    public function detail($slug)
    {
        $project = ProjectModel::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('pages.guest.project-detail', compact('project'));
    }
}
