<?php


namespace App\TitlesManager\Titles\Models;

use Illuminate\Database\Eloquent\Model;

/**
* Class TitleEloquent
 * @property integer id
* @property string name
* @package App\TitlesManager\Titles\Models
*/
class PlatformEloquent extends Model
{
    /**
     *
     */
    const NETFLIX_ID = 1;
    /**
     *
     */
    const HULU_ID = 2;
    /**
     *
     */
    const AMAZON_ID = 4;
    /**
     * @var string
     */
    protected $table = 'platforms';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return bool
     */
    public function isNetflix()
    {
        return $this->id === self::NETFLIX_ID;
    }

    /**
     * @return bool
     */
    public function isAmazon()
    {
        return $this->id === self::AMAZON_ID;
    }

    /**
     * @return bool
     */
    public function isHulu()
    {
        return $this->id === self::HULU_ID;
    }
}
