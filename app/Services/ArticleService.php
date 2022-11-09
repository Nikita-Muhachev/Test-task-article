<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class ArticleService
{

    /**
     * Получение списка всех статей.
     *
     * @return LengthAwarePaginator
     */
    public function index($limit)
    {

        return Article::query()
            ->where(function (Builder $query) {
                if (!request()->has('tag')) {
                    return;
                }
                $query->whereHas('tags', function (Builder $query) {
                    $tag = request()->input('tag');
                    $query->where('name', $tag);
                });
            })
            ->orderByDesc('created_at')
            ->paginate($limit);
    }

}