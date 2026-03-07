<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Member;

class HomeController extends Controller
{
    public function index()
    {
        $hero_section = HeroSection::orderByDesc('id')->first();
        $members_count = Member::where('is_active', true)->count();
        $members = Member::where('is_active', true)->orderByDesc('id')->limit(5)->get();

        return view('pages.guest.home', compact('hero_section', 'members_count', 'members'));
    }

    public function memberDetail(Member $member)
    {
        return view('pages.guest.member-detail', compact('member'));
    }
}
