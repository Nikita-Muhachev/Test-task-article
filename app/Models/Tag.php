<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models
 *
 * @property int id
 * @property string name
 *
 * @property Collection|Article[] articles
 *
 * @method static Builder|Tag query()
 */
class Tag extends Model
{
    use HasFactory;

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
