<?php


namespace App\TitlesManager\Titles\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class TitleEloquent
 * @property integer id
 * @property string name
 * @property integer release_year
 * @property float imdb_rating
 * @property integer tomatometer
 * @property boolean is_show
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
}
