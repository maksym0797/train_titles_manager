<?php


namespace App\TitlesManager\User\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class UserTitleLikeEloquent
 * @property integer id
 * @property integer user_id
 * @property integer title_id
 * @property boolean like
 * @package App\TitlesManager\User\Models
 */
class UserTitleLikeEloquent extends Model
{
    protected $table = 'user_title_likes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title_id',
        'like',
    ];
}
