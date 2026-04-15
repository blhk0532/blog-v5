<?php

namespace App\Livewire\ComplaintWizard;

use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Spatie\LivewireWizard\Components\StepComponent;

/**
 * Collects company details for the complaint.
 */
class FirstStep extends StepComponent
{
    #[Validate('required|string|max:255')]
    public string $company_name = '';

    #[Validate('required|integer|min:1|max:5')]
    public int $rating = 1;

    #[Validate('required|string|max:255')]
    public string $location = '';

    #[Validate('required|string|in:pending,resolved,unresolved')]
    public string $status = 'pending';

    public function stepInfo() : array
    {
        return [
            'label' => 'Company details',
        ];
    }

    public function render() : View
    {
        return view('livewire.complaint-wizard.first-step');
    }

    public function submit() : void
    {
        $this->validate();
        $this->nextStep();
    }
}
