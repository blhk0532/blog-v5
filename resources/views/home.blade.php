{{--
Displays the home view.
--}}

<x-app :title="config('app.name')">
    <div class="container xl:max-w-(--breakpoint-lg)">
        <div class="text-xl tracking-tight font-normal text-center text-black mb-4">
            <div class="font-handwriting">Including a ton of scrapers too!</div>
            <x-heroicon-o-arrow-down class="size-4 mx-auto mt-1" />
        </div>

        <x-typography.headline>
            File a complaint against any company. Join <span class="text-blue-600">{{ Number::format($visitors) }}</span>+ users sharing their experiences.
        </x-typography.headline>

        <x-typography.subheadline class="mt-6 md:mt-10">
            Share your complaint, rate companies, and get resolutions.
        </x-typography.subheadline>

        <div class="flex gap-2 justify-center items-center mt-7 text-center md:mt-11">
            <x-btn
                size="md"
                wire:navigate
                href="#about"
            >
                About
            </x-btn>

            <x-btn
                primary
                size="md"
                wire:navigate
                href="{{ route('complaints.create') }}"
            >
                File a Complaint
            </x-btn>
        </div>
    </div>

    <x-section title="Latest Complaints" id="latest" class="mt-24 md:mt-32">
        @if ($latest->isNotEmpty())
            <x-posts-grid :posts="$latest" />
        @endif

        <x-btn
            primary
            wire:navigate
            href="{{ route('posts.index') }}"
            class="table mx-auto mt-16"
        >
            Browse all complaints
        </x-btn>
    </x-section>


    <x-section title="Latest Companies" id="links" class="mt-24 md:mt-32">
        @if ($links->isNotEmpty())
            <x-links-grid :$links />
        @endif

        <x-btn
            primary
            wire:navigate
            href="{{ route('links.index') }}"
            class="table mx-auto mt-16"
        >
            Browse all companies
        </x-btn>
    </x-section>

    @if ($aboutUser)
        <x-section title="About File a Complaint" id="about" class="mt-24 lg:max-w-(--breakpoint-md) md:mt-32">
            <x-prose>
                <img
                    loading="lazy"
                    src="{{ $aboutUser->avatar }}"
                    alt="File a Complaint logo"
                    class="float-right mt-4 ml-4 rounded-full! size-20 sm:size-28 md:size-32"
                />

                <p>File a Complaint is a platform where consumers can share their experiences with companies and services. Our goal is to hold businesses accountable and help resolve issues. Founded by Simon Wilby.</p>
            </x-prose>
        </x-section>
    @endif
</x-app>
