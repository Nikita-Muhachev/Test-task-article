<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
            ->orderByDesc('created_at')
            ->paginate($limit);
    }

}