{{--
Displays the livewire complaint wizard first step Livewire view.
--}}

<x-slot:title>
    File a Complaint - Company Details
</x-slot>

<div>
    <x-section class="mt-16 md:max-w-(--breakpoint-sm)">
        <x-complaint-wizard.steps :$steps />

        <x-form wire:submit="submit" class="grid gap-4 mt-8">
            <x-form.input
                label="Company Name"
                type="text"
                id="company_name"
                wire:model="company_name"
                required
                autofocus
            />

            <x-form.input
                label="Rating (1-5)"
                type="number"
                id="rating"
                wire:model="rating"
                min="1"
                max="5"
                required
            />

            <x-form.input
                label="Location (City, State, Country)"
                type="text"
                id="location"
                wire:model="location"
                required
            />

            <x-form.select
                label="Status"
                id="status"
                wire:model="status"
                required
            >
                <option value="pending">Pending</option>
                <option value="resolved">Resolved</option>
                <option value="unresolved">Unresolved</option>
            </x-form.select>

            <x-btn primary class="mt-4 text-blue-900! hover:bg-blue-100! bg-blue-50! place-self-center">
                Next
            </x-btn>
        </x-form>
    </x-section>
</div>