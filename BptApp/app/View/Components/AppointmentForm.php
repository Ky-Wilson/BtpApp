<?php

// app/View/Components/AppointmentForm.php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use App\Models\Ad; // Assurez-vous d'importer le modèle Ad

class AppointmentForm extends Component
{
    public $ad;

    public function __construct(Ad $ad)
    {
        $this->ad = $ad;
    }

    public function render(): Closure
    {
        return function (array $data) {
            return view('components.appointment-form', $data)->render();
        };
    }
}