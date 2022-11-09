<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Resources\ArticleResource;
use App\Jobs\AddCommentJob;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    public ArticleService $articleService;

    public function __construct()
    {
        $this->articleService = app(ArticleService::class);
    }

    /**
     * Получение списка всех статей.
     *
     * @queryParam limit Количество элементов на страницу.
     * @queryParam offset Смещение.
     * @queryParam page Количественный номер текущей страницы.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $limit = request()->has('limit') ? request()->input('limit') : 10;

        $articles = $this->articleService->index($limit);

        return ArticleResource::collection($articles);
    }

    /**
     * Получить одну статью.
     *
     * @param Article $article
     *
     * @return ArticleResource
     */
    public function show(Article $article)
    {
        $article->load(['comments', 'tags']);
        return new ArticleResource($article);
    }

    /**
     * Добавить лайк статье
     *
     * @param Article $article
     *
     * @return ArticleResource
     */
    public function addLike(Article $article)
    {
        $article->update([
            'like_count' => ++$article->like_count
        ]);
        return new ArticleResource($article);
    }

    /**
     * Добавить просмотр статье
     *
     * @param Article $article
     *
     * @return ArticleResource
     */
    public function addView(Article $article)
    {
        $article->update([
            'views_count' => ++$article->views_count
        ]);

        $article->load(['comments', 'tags']);
        return new ArticleResource($article);
    }

    /**
     * Добавить комментарий статье
     *
     * @param Article $article
     * @param CreateCommentRequest $articleLikeRequest
     * @return ArticleResource
     */
    public function addComment(Article $article, CreateCommentRequest $articleLikeRequest)
    {
        $data = $articleLikeRequest->validated();
        AddCommentJob::dispatch($data, $article);

        $article->load(['comments', 'tags']);
        return new ArticleResource($article);
    }
}
