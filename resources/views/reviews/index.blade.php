{{--
Displays the reviews index view.
--}}

<x-app
    title="Latest company reviews and complaints - File a Complaint"
    description="A collection of reviews and complaints about companies and services."
>
    <div class="container mb-12 md:mb-14">
        <x-breadcrumbs :items="$breadcrumbs" />
    </div>

    @if ($links->currentPage() === 1)
        <div class="container text-center">
            <x-typography.headline>
                <span class="text-blue-600">Share your experience</span> with companies
            </x-typography.headline>

            <x-typography.subheadline class="mt-6 md:mt-10">
                Find reviews and complaints shared by <span class="font-medium">{{ $distinctUsersCount }} users</span>.
            </x-typography.subheadline>

            <div class="flex justify-center items-center mt-4 md:mt-6">
                @foreach ($distinctUserAvatars as $avatar)
                    <div class="overflow-hidden -ml-2 bg-white rounded-full">
                        <img loading="lazy" src="{{ $avatar }}" class="size-8 md:size-10" />
                    </div>
                @endforeach
            </div>

            <div class="flex gap-2 justify-center items-center mt-8 text-center md:mt-12">
                <x-btn href="#reviews">
                    Browse reviews
                </x-btn>

                <x-btn
                    primary
                    :wire:navigate="auth()->check()"
                    href="{{ route('reviews.create') }}"
                >
                    Submit a review
                </x-btn>
            </div>
        </div>
    @endif

    <x-section :title="$links->currentPage() > 1
        ? 'Page ' . $links->currentPage()
        : 'Latest Reviews'"
    :heading-tag="$links->currentPage() === 1 ? 'h2' : 'h1'"
    id="reviews" @class([
        'mt-16 md:mt-24' => $links->currentPage() === 1,
    ])>
        @if ($links->isNotEmpty())
            <x-links-grid :$links />
        @endif

        <x-pagination
            :paginator="$links"
            class="mt-16"
        />
    </x-section>

    <script type="application/ld+json">
        {!! json_encode($breadcrumbSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
</x-app>
