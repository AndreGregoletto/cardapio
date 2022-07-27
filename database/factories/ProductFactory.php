<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = Category::pluck('id')->toArray();

        return [
            'category_id' => $this->faker->randomElement($categories),
            'code'        => $this->faker->numberBetween(0, 1000),
            'photo'       => $this->faker->image(),
            'name'        => $this->faker->sentence(4),
            'description' => $this->faker->text(5),
            'price'       => $this->faker->numberBetween(0, 250)
        ];
    }
}
