<?php

namespace Database\Factories;

use App\Models\Example;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Example>
 */
class ExampleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Image spacing example',
            'notes' => '<p>Text above the image.</p><p><strong>Inline label</strong> <img src="/example.svg" alt="Example" width="120" height="80"> trailing text</p><p>Text below the image.</p>',
        ];
    }
}
