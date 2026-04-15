<?php

namespace App\Livewire\ComplaintWizard;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Spatie\LivewireWizard\Components\StepComponent;
use App\Notifications\ComplaintWaitingForValidation;

/**
 * Collects complaint details and stores submitted complaints.
 */
class SecondStep extends StepComponent
{
    #[Locked]
    #[Url(history: true)]
    public string $company_name;

    #[Locked]
    #[Url(history: true)]
    public int $rating;

    #[Locked]
    #[Url(history: true)]
    public string $location;

    #[Locked]
    #[Url(history: true)]
    public string $status;

    #[Validate('required|string|min:3|max:255')]
    public string $title = '';

    #[Validate('required|string|min:10')]
    public string $content = '';

    public function mount() : void
    {
        // Ensure previous step data is present
        if (! $this->company_name) {
            $this->previousStep();
        }
    }

    public function stepInfo() : array
    {
        return [
            'label' => 'Complaint details',
        ];
    }

    public function render() : View
    {
        return view('livewire.complaint-wizard.second-step');
    }

    public function submit() : void
    {
        $this->validate();

        $post = Post::query()->create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'content' => $this->content,
            'company_name' => $this->company_name,
            'rating' => $this->rating,
            'location' => $this->location,
            'status' => $this->status,
            'published_at' => null, // pending moderation
        ]);

        User::query()
            ->where('github_login', 'benjamincrozat')
            ->first()
            ->notify(new ComplaintWaitingForValidation($post));

        $this->redirectRoute('posts.index', ['submitted' => true], navigate: true);
    }
}
