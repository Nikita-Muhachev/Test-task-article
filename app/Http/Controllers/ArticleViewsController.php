<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\HttpFoundation\ParameterBag;
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
        request()->setJson(new ParameterBag(["limit" => 6]));

        $articles = $this->index();

        VarDumper::dump($articles);
        return view('main', $articles);
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
        request()->setJson(new ParameterBag(["limit" => 10]));
        
        $articles = $this->index();

        return view('articles', $articles);
    }

    /**
     * Получение списка всех статей для страницы article.
     *
     * @return Application
     */
    public function article(Article $article)
    {
        $article = $this->show($article);

        return view('article', $article);
    }
}
