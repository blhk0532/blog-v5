<?php

use function Pest\Laravel\get;

use Illuminate\Support\Collection;

it('lists posts', function () {
    get(route('categories.index'))
        ->assertOk()
        ->assertViewIs('categories.index')
        ->assertViewHas('categories', fn (Collection $categories) => true)
        ->assertViewHas('breadcrumbs', [
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Categories'],
        ])
        ->assertViewHas('breadcrumbSchema', [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => route('home'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Categories',
                ],
            ],
        ]);
});
