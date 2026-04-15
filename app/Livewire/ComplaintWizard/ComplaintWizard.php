<?php

namespace App\Livewire\ComplaintWizard;

use Spatie\LivewireWizard\Components\WizardComponent;

/**
 * Defines the ordered steps for the public complaint submission wizard.
 */
class ComplaintWizard extends WizardComponent
{
    public function steps() : array
    {
        return [
            FirstStep::class,
            SecondStep::class,
        ];
    }
}
