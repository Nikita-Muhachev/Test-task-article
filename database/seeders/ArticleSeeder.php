<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

/**
 * Class ArticleSeeder
 */
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Article[] $articles */
        $articles = Article::factory(20)->create();

        foreach ($articles as $article) {
            $tags = Tag::query()->inRandomOrder()->limit(rand(1, 4))->get();
            $article->tags()->attach($tags);
        }
    }
}
