<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Article;
use App\Models\Comment;
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

        return view('main', ['articles' => $articles]);
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
        $limit = request()->has('limit') ? request()->input('limit') : 10;
        $articles = $this->articleService->index($limit);

        return view('articles', ['articles' => $articles]);
    }

    /**
     * Получение списка всех статей для страницы article.
     *
     * @return Application
     */
    public function article(Article $article)
    {
        $this->addView($article);

        return view('article', [
            'article' => $article,
            'tags' => $article->tags,
            'comments' => $article->comments,
        ]);
    }

    /**
     * Добавить комментарий статье
     *
     * @param Article $article
     * @param CreateCommentRequest $articleLikeRequest
     * @return Application
     */
    public function addComment(Article $article, CreateCommentRequest $articleLikeRequest)
    {
        $data = $articleLikeRequest->validated();
        $data['article_id'] = $article->id;
        Comment::query()
            ->create($data);

        return redirect("/articles/$article->id");
    }
}
