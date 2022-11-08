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
 * @property Carbon|null created_at
 * @property Carbon|null updated_at
 *
 * @method static Builder|Comment query()
 */
class Comment extends Model
{
    protected $table = 'comments';
    protected $guarded = ['id'];


}
