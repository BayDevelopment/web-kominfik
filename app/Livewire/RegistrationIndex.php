<?php

namespace App\Livewire;

use App\Models\RegistrationTypModel;
use Livewire\Component;

class RegistrationIndex extends Component
{
    public $registrations;

    public function mount()
    {
        // ambil semua jenis pendaftaran (member, sponsor, universitas)
        $this->registrations = RegistrationTypModel::all();
    }

    public function render()
    {
        return view('livewire.registration-index');
    }
}
