<?php


namespace App\TitlesManager\Titles\Models;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TitleEloquent
 * @property integer id
 * @property string name
 * @property integer release_year
 * @property float imdb_rating
 * @property integer tomatometer
 * @property boolean is_show
 * @property Collection platforms
 * @package App\TitlesManager\Titles\Models
 */
class TitleEloquent extends Model
{
    protected $table = 'titles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'release_year',
        'imdb_rating',
        'tomatometer',
        'is_show',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function platforms()
    {
        return $this->hasManyThrough(
            PlatformEloquent::class,
            TitlePlatformEloquent::class,
            'title_id', // Foreign key on users table...
            'id', // Foreign key on posts table...
            'id', // Local key on countries table...
            'platform_id' // Local key on users table...
        );
    }
}
