<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    public function definition() : array
    {
        $categories = [
            'Banking', 'Retail', 'Technology', 'Telecommunications', 'Healthcare',
            'Transportation', 'Insurance', 'Utilities', 'Government', 'Education',
            'Real Estate', 'Hospitality', 'Automotive', 'Food & Beverage', 'Energy',
            'Entertainment', 'Legal', 'Marketing', 'Manufacturing', 'Construction',
        ];

        $name = fake()->randomElement($categories) . ' ' . fake()->randomNumber(2);

        return [
            'name' => $name,
            'slug' => fake()->slug(),
        ];
    }
}
