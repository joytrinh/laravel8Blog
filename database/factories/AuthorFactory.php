<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return $this->afterMaking(function (Author $author) {
            //
        })->afterCreating(function (Author $author) {
            // $author->profile()->save(factory(App\Models\Profile::class))->make()
        });
    }
}
