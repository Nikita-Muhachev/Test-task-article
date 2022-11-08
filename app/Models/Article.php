<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Pass
 *
 * @property int id
 * @property string title
 * @property string text
 * @property string like_count
 * @property Carbon|null created_at
 * @property Carbon|null updated_at
 *
 * @property Collection|Tag[] tags
 *
 * @method static Builder|Article query()
 * @method static Factory|Tag factory($count = 1)
 */
class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = ['id'];

    /**
     * Связь многие ко многим с таблицей tags
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'article_tag',
            'article_id',
            'tag_id'
        );
    }
}
