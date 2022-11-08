<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Pass
 *
 * @property int id
 * @property string title
 * @property string text
 * @property int like_count
 * @property int views_count
 * @property Carbon|null created_at
 * @property Carbon|null updated_at
 *
 * @property Collection|Tag[] tags
 * @property Collection|Comment[] comments
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

    /**
     * Связь один ко многим с таблицей comments
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
