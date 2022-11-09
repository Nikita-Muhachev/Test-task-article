<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models
 *
 * @property int id
 * @property string title
 * @property string text
 * @property int article_id
 * @property Carbon|null created_at
 * @property Carbon|null updated_at
 *
 * @property Collection|Article article
 *
 * @method static Builder|Comment query()
 * @method static Factory|Tag factory($count = 1)
 */
class Comment extends Model
{
    protected $table = 'comments';
    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
