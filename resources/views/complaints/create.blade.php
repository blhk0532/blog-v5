{{--
File a complaint page.
--}}

<x-app title="File a Complaint">
    <div class="container lg:max-w-(--breakpoint-md)">
        <h1 class="text-3xl font-bold tracking-tight text-center text-black md:text-4xl">File a Complaint</h1>
        <p class="mt-4 text-center text-gray-600">Share your complaint about a company or service. We'll help you get heard.</p>

        <div class="mt-8 p-6 bg-gray-50 rounded-xl">
            <p class="text-gray-700">Complaint submission form will be implemented soon.</p>
            <p class="mt-4">For now, you can browse existing complaints.</p>
            <x-btn primary wire:navigate href="{{ route('posts.index') }}" class="mt-6">
                Browse Complaints
            </x-btn>
        </div>
    </div>
</x-app>