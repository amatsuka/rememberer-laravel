<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Note
 *
 * @property int $id
 * @property int $parent_id
 * @property string $text
 * @property string $code
 * @property string $tCode
 * @property string $password_hash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note whereTCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note wherePasswordHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Note whereParentId($value)
 * @mixin \Eloquent
 *
 * *  @SWG\Definition(definition="Note", description="Заметка", type="object")
 * @SWG\Property(property="text", example="Текст заметки")
 * @SWG\Property(property="code", example="Фраза идентифицирующая заметку")
 * @SWG\Property(property="t_code", example="Фраза идентифицирующая заметку в транслите")
 * @SWG\Property(property="parent_id", example="Id родительской записи")
 */
class Note extends Model
{
    public $fillable = ['text', 'code', 't_code', 'password_hash', 'parent_id'];
}
