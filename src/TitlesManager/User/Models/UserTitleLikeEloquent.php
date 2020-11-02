<?php


namespace App\TitlesManager\User\Models;


use App\TitlesManager\Titles\Models\TitleEloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserTitleLikeEloquent
 * @property integer id
 * @property integer user_id
 * @property integer title_id
 * @property boolean like
 * @property TitleEloquent title
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function title()
    {
        return $this->hasOne(TitleEloquent::class, 'id', 'title_id');
    }
}
