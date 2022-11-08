<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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
 * @method static Builder|Article query()
 */
class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = ['id'];


}
