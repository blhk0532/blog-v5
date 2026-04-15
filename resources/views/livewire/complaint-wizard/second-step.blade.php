{{--
Shows the complaint details step and expects the shared wizard step state.
--}}

<div>
    <x-slot:title>
        File a Complaint - Details
    </x-slot>

    <x-section class="mt-16 md:max-w-(--breakpoint-sm)">
        <x-complaint-wizard.steps :$steps />

        <x-form wire:submit="submit" class="grid gap-4 mt-8">
            <div class="p-4 bg-gray-50 rounded-xl">
                <h3 class="font-bold">Company Details</h3>
                <p><strong>Company:</strong> {{ $company_name }}</p>
                <p><strong>Rating:</strong> {{ $rating }}/5</p>
                <p><strong>Location:</strong> {{ $location }}</p>
                <p><strong>Status:</strong> {{ ucfirst($status) }}</p>
            </div>

            <x-form.input
                label="Complaint Title"
                type="text"
                id="title"
                wire:model="title"
                required
                autofocus
            />

            <x-form.textarea
                label="Complaint Details"
                rows="6"
                id="content"
                wire:model="content"
                required
            />

            <x-btn primary class="place-self-center mt-4">
                Submit Complaint
            </x-btn>
        </x-form>
    </x-section>
</div>