<?php

namespace App\Jobs;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Сохранение комментариев
 * Class AddCommentJob
 * @package App\Jobs
 */
class AddCommentJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public int $timeout = 0;

    private Article $article;
    private array $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data, Article $article)
    {
        $this->data = $data;
        $this->article = $article;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        $this->data['article_id'] = $this->article->id;
        Comment::query()
            ->create($this->data);
    }
}
