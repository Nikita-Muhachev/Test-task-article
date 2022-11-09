<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(rand(5, 50)),
            'text' => $this->faker->text(rand(200, 1000)),
            'created_at' => $this->faker->dateTime(),
        ];
    }
}
