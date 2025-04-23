<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Books;
use App\Models\Author;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BooksFactory extends Factory
{
    protected $model = Books::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'publish_year' => $this->faker->year(),
            'author_id' =>Author::factory(),
      
        ];
   
    }
}