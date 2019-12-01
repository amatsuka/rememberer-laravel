<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Word
 *
 * @property int $id
 * @property string $text
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Word newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Word newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Word query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Word whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Word whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Word whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Word whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Word whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Word extends Model
{
    public $fillable = ['text', 'locale'];

    public $timestamps = false;
}
