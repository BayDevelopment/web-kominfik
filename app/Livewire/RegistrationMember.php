<?php

namespace App\Livewire;

use App\Models\Member;
use App\Models\Team;
use Carbon\Carbon;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class RegistrationMember extends Component
{
    public $name = '';
    public $intake_year = '';
    public $team_id = '';

    public function mount()
    {
        $this->intake_year = Carbon::now()->subYears(4)->year;
    }

    public function render()
    {
        return view('livewire.registration-member', [
            'teams' => Team::all()
        ]);
    }

    public function handleSubmit()
    {
        $validated = $this->validate(rules: [
            'name' => 'required|min:3|max:255',
            'intake_year' => 'required|date_format:Y',
            'team_id' => 'required|exists:teams,id',
        ], attributes: ['team_id' => 'team']);

        $validated['is_active'] = false;

        Member::create($validated);

        Alert::success('Success', 'Thank your for your registration!');

        // Redirect triggers the layout reload and the alert
        return redirect()->route('home');
    }
}
