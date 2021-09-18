<?php

namespace Database\Factories;

use App\Models\Pages;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pages::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'parent_id' => NULL,
            'title' => $this->faker->text(10),
            'content' => $this->faker->text,
            'slug' => $this->faker->slug
        ];
    }

  
}
