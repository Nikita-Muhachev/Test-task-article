<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\VarDumper\VarDumper;

/**
 * Class ArticleViewsController
 * @package App\Http\Controllers
 */
class ArticleViewsController extends ArticleController
{

    /**
     * Получение списка всех статей для страницы main.
     *
     * @queryParam limit Количество элементов на страницу.
     * @queryParam offset Смещение.
     * @queryParam page Количественный номер текущей страницы.
     *
     * @return Application
     */
    public function main()
    {
        $limit = request()->has('limit') ? request()->input('limit') : 6;
        $articles = $this->articleService->index($limit);

        $articlesResource = ArticleResource::collection($articles);
        VarDumper::dump($articlesResource->resource->toArray());
        return view('main', $articlesResource->resource->toArray());
    }

    /**
     * Получение списка всех статей для страницы articles.
     *
     * @queryParam limit Количество элементов на страницу.
     * @queryParam offset Смещение.
     * @queryParam page Количественный номер текущей страницы.
     *
     * @return Application
     */
    public function articles()
    {
        $articles = $this->index();

        return view('articles', $articles->resource->toArray());
    }

    /**
     * Получение списка всех статей для страницы article.
     *
     * @return Application
     */
    public function article(Article $article)
    {
        $article = $this->show($article);

        return view('article', $article->resource->toArray());
    }
}
