<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Pass
 *
 * @property int id
 * @property string name
 * @property Carbon|null created_at
 * @property Carbon|null updated_at
 *
 * @method static Builder|Tag query()
 */
class Tag extends Model
{
    protected $table = 'tags';
    protected $guarded = ['id'];

    public $timestamps = false;
}
