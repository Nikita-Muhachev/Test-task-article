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
 * @property string name
 * @property Carbon|null created_at
 * @property Carbon|null updated_at
 *
 * @property Collection|Article[] articles
 *
 * @method static Builder|Tag query()
 * @method static Factory|Tag factory($count = 1)
 */
class Tag extends Model
{
    protected $table = 'tags';
    protected $guarded = ['id'];

    public $timestamps = false;

    /**
     * Связь многие ко многим с таблицей tags
     *
     * @return BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(
            Article::class,
            'article_tag',
            'tag_id',
            'article_id'
        );
    }
}
